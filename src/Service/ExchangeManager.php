<?php


namespace iikoExchangeBundle\Service;

use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Engine\ExchangeGrabEngineInterface;
use iikoExchangeBundle\Contract\Engine\ResponseProcessingEngineInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\ExchangeParametersInterface;
use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithMultiRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Formatter\IPreviewFormatter;
use iikoExchangeBundle\Contract\iikoStorage\ExtractorInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageEntityInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Contract\Schedule\ScheduleInterface;
use iikoExchangeBundle\Contract\Service\ExchangeConfigStorageInterface;
use iikoExchangeBundle\Contract\Service\ExchangeMappingStorageInterface;
use iikoExchangeBundle\Contract\Service\PreviewStorageInterface;
use iikoExchangeBundle\Event\ExchangeDoneEvent;
use iikoExchangeBundle\Event\ExchangeEngineDataDoneEvent;
use iikoExchangeBundle\Event\ExchangeEngineFormatEvent;
use iikoExchangeBundle\Event\ExchangeEngineLoadEvent;
use iikoExchangeBundle\Event\ExchangeEngineSendRequestEvent;
use iikoExchangeBundle\Event\ExchangeEngineTransformDataEvent;
use iikoExchangeBundle\Event\ExchangeErrorEvent;
use iikoExchangeBundle\Event\ExchangeStartEvent;
use iikoExchangeBundle\Exception\ConfigNotFoundException;
use iikoExchangeBundle\Exception\EngineNotFoundDataException;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\Exception\MappingNotFoundException;
use iikoExchangeBundle\Exception\MappingNotIncludedException;
use iikoExchangeBundle\Exception\StartUpParameterNotFound;
use iikoExchangeBundle\ExtensionHelper\PeriodicalExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRestaurantExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRevisionExtensionHelper;
use iikoExchangeBundle\iikoExchangeBundle;
use iikoExchangeBundle\Library\Request\ExchangeDataCollection;
use iikoExchangeBundle\Library\Request\iikoOlapRequest;
use iikoExchangeBundle\Library\Request\RequestResponseItem;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class ExchangeManager
{

	private ExchangeConfigStorageInterface $configStorage;
	private ExchangeMappingStorageInterface $mappingStorage;
	private EventDispatcherInterface $dispatcher;
	private LoggerInterface $logger;
	private TranslatorInterface $translator;
	private PreviewStorageInterface $previewStorage;
	private bool $isDebug = false;

	/**
	 * @param PreviewStorageInterface $dataStorage
	 * @param ExchangeConfigStorageInterface $configStorage
	 * @param ExchangeMappingStorageInterface $mappingStorage
	 * @param EventDispatcherInterface $dispatcher
	 */
	public function __construct(PreviewStorageInterface $previewStorage, ExchangeConfigStorageInterface $configStorage, ExchangeMappingStorageInterface $mappingStorage, EventDispatcherInterface $dispatcher, LoggerInterface $logger, TranslatorInterface $translator)
	{

		$this->configStorage = $configStorage;
		$this->mappingStorage = $mappingStorage;
		$this->dispatcher = $dispatcher;
		$this->logger = $logger;
		$this->translator = $translator;
		$this->previewStorage = $previewStorage;
	}


	public function startExchange(ExchangeInterface $exchange, string $scheduleType, ExchangeParametersInterface $params): bool
	{
		$this->logger->info('Exchange. Start', ['exchangeCode' => $exchange->getCode(), 'exchangeId' => $exchange->getId(), 'scheduleType' => $scheduleType, 'params' => $params]);

		$this->setParams($exchange, $params);

		foreach ($exchange->getChildNodes() as $node)
		{
			$this->fillConfiguration($exchange, $node, WithRestaurantExtensionHelper::extractRestaurant($exchange));
			$this->fillMapping($exchange, $node, WithRestaurantExtensionHelper::extractRestaurant($exchange));
			$this->fillExchange($exchange, $node);
		}

		try
		{
			$this->runExchange($exchange, $scheduleType);
			$this->dispatcher->dispatch('exchange.done', new ExchangeDoneEvent($exchange, $scheduleType));
		}

		catch (ExchangeException $exception)
		{
			if ($this->isDebug)
			{
				throw $exception;
			}

			$this->logger->critical('Exchange exception', ['type' => get_class($exception), 'exchangeCode' => $exchange->getCode(), 'exception' => $exception->getMessage(), 'file' => $exception->getFile(), 'line' => $exception->getLine()]);
			$error = $this->getError($exchange, $exception);
			if ($scheduleType === ScheduleInterface::TYPE_PREVIEW)
			{
				$this->previewStorage->error($exchange, $error->getMessage());
				$this->previewStorage->clearData($exchange);
			}
			else
			{
				$this->dispatcher->dispatch('exchange.error', new ExchangeErrorEvent($exchange, $error, $scheduleType));
			}
			return false;

		}
		catch (\Exception|\Throwable $exception)
		{
			if ($this->isDebug)
			{
				throw $exception;
			}
			$this->logger->critical('Exchange exception', ['type' => get_class($exception), 'exchangeCode' => $exchange->getCode(), 'exchangeUniq' => $exchange->getUniq(), 'exchangeId' => $exchange->getId(), 'exception' => $exception->getMessage(), 'file' => $exception->getFile(), 'line' => $exception->getLine()]);
			$error = (new ExchangeException('SERVER_ERROR'))->setExchange($exchange);
			if ($scheduleType === ScheduleInterface::TYPE_PREVIEW)
			{
				$this->previewStorage->error($exchange, $error->getMessage());
				$this->previewStorage->clearData($exchange);
			}
			else
			{
				$this->dispatcher->dispatch('exchange.error', new ExchangeErrorEvent($exchange, $error, $scheduleType));
			}
			return false;
		}

		return true;
	}


	private function runExchange(ExchangeInterface $exchange, string $scheduleType)
	{
		$this->dispatcher->dispatch('exchange.start', new ExchangeStartEvent($exchange, $scheduleType));

		$data = new ExchangeDataCollection;

		foreach ($exchange->getEngines() as $engine)
		{
			if ($engine->getEnabled() === false)
			{
				continue;
			}
			if ($engine instanceof ExchangeGrabEngineInterface)
			{
				if ($scheduleType !== ScheduleInterface::TYPE_GRAB)
				{
					continue;
				}
				$data->add($engine->getGrabber()->grabData(), $engine->getGrabber()->getCode());
			}
			else
			{
				if ($scheduleType === ScheduleInterface::TYPE_GRAB)
				{
					continue;
				}

				/** @var ExchangeEngineInterface $engine */
				foreach ($engine->getRequests() as $request)
				{
					if ($engine instanceof WithMultiRestaurantExtensionInterface)
					{
						foreach ($engine->getRestaurantCollection() as $restaurant)
						{
							if (!$data->exist($request->getCode(), $restaurant))
							{
								if (WithRestaurantExtensionHelper::isNeedRestaurant($request))
								{
									//TODO скрытый баг, когда 1 реквест используют раные движки, и настройки в таком случае просто затрутся и для след. движка будут не корректными
									WithRestaurantExtensionHelper::setRestaurantForExchangeNode($request, $restaurant);
									$this->fillConfiguration($exchange, $request, $restaurant);
									$this->fillMapping($exchange, $request, $restaurant);
								}

								$data->add($this->callRequest($exchange, $engine, $scheduleType, $request, $restaurant), $request->getCode(), $restaurant);
							}
						}
					}
					elseif (!$data->exist($request->getCode()))
					{
						$data->add($this->callRequest($exchange, $engine, $scheduleType, $request), $request->getCode());
					}
				}
			}

			if (!($engine instanceof ExchangeGrabEngineInterface))
			{
				$this->dispatcher->dispatch('exchange.engine.transform', new ExchangeEngineTransformDataEvent($exchange, $engine, $scheduleType));
			}
			$transformed = $engine->getTransformer()->transform($exchange, $engine, $data);

			if ($scheduleType === ScheduleInterface::TYPE_PREVIEW)
			{
				$saveData = $transformed;
				if ($engine->getFormatter() instanceof IPreviewFormatter)
				{
					$saveData = $engine->getFormatter()->getFormattedData($exchange, $transformed);
					if ($saveData instanceof \Iterator)
					{
						$saveData = iterator_to_array($saveData);
					}
				}
				$this->previewStorage->saveData($exchange, $engine, $saveData);
			}
			else
			{
				if (!($engine instanceof ExchangeGrabEngineInterface))
				{
					$this->dispatcher->dispatch('exchange.engine.format', new ExchangeEngineFormatEvent($exchange, $engine, $transformed, $scheduleType));
				}
				$formatted = $engine->getFormatter()->getFormattedData($exchange, $transformed);
				$this->load($formatted, $engine, $exchange, $scheduleType);
			}
			if (!($engine instanceof ExchangeGrabEngineInterface))
			{
				$this->dispatcher->dispatch('exchange.engine.dataDone', new ExchangeEngineDataDoneEvent($exchange, $engine, $scheduleType));
			}
		}
	}

	/**
	 * @param $formatted
	 * @param ExchangeEngineInterface | ExchangeGrabEngineInterface $engine
	 * @param ExchangeInterface $exchange
	 * @param string $scheduleType
	 * @return void
	 * @throws ExchangeException
	 */
	protected function load($formatted, $engine, ExchangeInterface $exchange, string $scheduleType)
	{
		$this->dispatcher->dispatch('exchange.engine.load', new ExchangeEngineLoadEvent($exchange, $engine, $formatted, $scheduleType));
		$loader = ($engine->getLoader() ?: $exchange->getLoader());


		foreach ($formatted instanceof \Iterator ? $formatted : [$formatted] as $item)
		{
			$response = null;
			if ($loader instanceof ConnectionInterface)
			{
				$response = $loader->sendRequest($item);
			}
			elseif ($loader instanceof StorageInterface)
			{
				$loader->store($item);
			}
			else
			{
				throw new ExchangeException("Unknown type of loader");
			}

			if ($engine instanceof ResponseProcessingEngineInterface)
			{
				if ($response === null)
				{
					throw (new ExchangeException("Engine cannot process null as response"))->setExchange($exchange);
				}
				$engine->processResponse($response, $formatted);
			}
		}
	}

	protected function callRequest(ExchangeInterface $exchange, ExchangeEngineInterface $engine, string $scheduleType, ExchangeRequestInterface $request, ?Restaurant $restaurant = null)
	{
		$this->logger->info("Exchange. Call request", ['requestCode' => $request->getCode(), 'engineCode' => $engine->getCode(), 'exchangeCode' => $exchange->getCode()]);
		if (WithRestaurantExtensionHelper::isNeedRestaurant($exchange) || WithRestaurantExtensionHelper::isNeedMultiRestaurant($exchange) || $restaurant)
		{
			if (PeriodicalExtensionHelper::isNeedPeriod($request))
			{
				$period = PeriodicalExtensionHelper::extractPeriod($exchange);
				if ($period->getDateFrom()->format('H:i:s') !== '00:00:00' || $period->getDateTo()->format('H:i:s') !== '00:00:00')
				{
					$period->withTimeZone(($restaurant ?: WithRestaurantExtensionHelper::extractRestaurant($exchange))->getDateTimeZone());
				}
				PeriodicalExtensionHelper::setPeriodForExchangeNode($request, $period);
			}
		}

		$this->dispatcher->dispatch('exchange.engine.sendRequest', new ExchangeEngineSendRequestEvent($exchange, $engine, $request, $scheduleType));

		$extractor = $engine->getExtractor() ?: $exchange->getExtractor();
		if ($extractor instanceof ExtractorInterface)
		{
			return $extractor->extract($request);
		}
		$response = $extractor->sendRequest($request);
		if ($response->getStatusCode() !== 200 || is_null($response->getBody()))
		{
			throw new EngineNotFoundDataException();
		}

		$response = $response->getBody()->__toString();
		return $request instanceof iikoOlapRequest ? $request->processResponse($response) : $response;

	}


	private function fillConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $node, ?Restaurant $restaurant)
	{
		if ($node instanceof ConfigurableExtensionInterface)
		{
			$configCollection = [];
			if (count($node->exposeGlobalConfiguration()) > 0)
			{
				$configCollection = array_merge($configCollection, $this->configStorage->getConfiguration($exchange, $exchange, $restaurant));
			}
			$configCollection = array_merge($configCollection, $this->configStorage->getConfiguration($exchange, $node, $restaurant));

			$node->setConfigCollection($configCollection);
		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->fillConfiguration($exchange, $childNode, $restaurant);
		}
	}

	private function fillMapping(ExchangeInterface $exchange, ExchangeNodeInterface $node, ?Restaurant $restaurant)
	{
		if ($node instanceof WithMappingExtensionInterface)
		{
			foreach ($node->getMapping() as $mapping)
			{
				/** @var ExchangeNodeInterface $node */
				$mappingCollection = $this->mappingStorage->getMapping($exchange, $mapping->getCode(), $restaurant);
				$this->logger->debug('Exchange. Set mapping', ['exchangeCode' => $exchange->getCode(), 'node' => $node->getCode(), 'mappingCode' => $mapping->getCode(), 'mappingList' => $mappingCollection]);
				$node->setMappingValues($mapping->getCode(), $mappingCollection);
			}

		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->fillMapping($exchange, $childNode, $restaurant);
		}
	}

	private function fillExchange(ExchangeInterface $exchange, ExchangeNodeInterface $node)
	{
		if ($node instanceof WithExchangeExtensionInterface)
		{
			$node->setExchange($exchange);
		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->fillExchange($exchange, $childNode);
		}
	}


	private function setParams(ExchangeInterface $exchange, ExchangeParametersInterface $params): void
	{
		if (WithRevisionExtensionHelper::isNeedRevision($exchange))
		{
			if (is_null($params->getRevision()))
			{
				throw (new StartUpParameterNotFound())->setExchange($exchange);
			}
			WithRevisionExtensionHelper::setRevisionForExchangeNode($exchange, $params->getRevision());

		}
		if (PeriodicalExtensionHelper::isNeedPeriod($exchange))
		{
			if (is_null($params->getPeriod()))
			{
				throw (new StartUpParameterNotFound())->setExchange($exchange);
			}
			PeriodicalExtensionHelper::setPeriodForExchangeNode($exchange, $params->getPeriod());
		}
		if (WithRestaurantExtensionHelper::isNeedMultiRestaurant($exchange))
		{
			if (is_null($params->getRestaurantCollection()))
			{
				throw (new StartUpParameterNotFound())->setExchange($exchange);
			}
			WithRestaurantExtensionHelper::setRestaurantCollectionForExchangeNode($exchange, $params->getRestaurantCollection());
		}
		elseif (WithRestaurantExtensionHelper::isNeedRestaurant($exchange))
		{
			if (is_null($params->getRestaurant()))
			{
				throw (new StartUpParameterNotFound())->setExchange($exchange);
			}
			WithRestaurantExtensionHelper::setRestaurantForExchangeNode($exchange, $params->getRestaurant());
		}
	}

	public function translate(ExchangeInterface $exchange, ExchangeNodeInterface $node)
	{
		$node->setName($this->trans($node->getCode() . ".NAME", $exchange->getCode()));
		$node->setDescription($this->trans($node->getCode() . ".DESCRIPTION", $exchange->getCode()));

		if ($node instanceof ConfigurableExtensionInterface)
		{
			foreach ($node->getConfiguration() as $configItem)
			{
				$configItem->setName($this->trans($configItem->getCode() . ".NAME", $exchange->getCode()));
				$configItem->setDescription($this->trans($configItem->getCode() . ".DESCRIPTION", $exchange->getCode()));
			}
			foreach ($node->getGlobalConfiguration() ?? [] as $globalConfig)
			{
				$globalConfig->setName($this->trans($globalConfig->getCode() . ".NAME", $exchange->getCode()));
				$globalConfig->setDescription($this->trans($globalConfig->getCode() . ".DESCRIPTION", $exchange->getCode()));
			}
		}
		if ($node instanceof WithMappingExtensionInterface)
		{
			foreach ($node->getMapping() as $mapping)
			{
				$mapping->setName($this->trans($mapping->getCode() . ".NAME", $exchange->getCode()));
				$mapping->setDescription($this->trans($mapping->getCode() . ".DESCRIPTION", $exchange->getCode()));

				foreach ($mapping->getExposedIdentifiers() as $identifier)
				{
					$identifier->setName($this->trans($identifier->getCode() . ".NAME", $exchange->getCode()));
					$identifier->setDescription($this->trans($identifier->getCode() . ".DESCRIPTION", $exchange->getCode()));
				}
				foreach ($mapping->getExposedValues() as $value)
				{
					$value->setName($this->trans($value->getCode() . ".NAME", $exchange->getCode()));
					$value->setDescription($this->trans($value->getCode() . ".DESCRIPTION", $exchange->getCode()));
				}
			}
		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->translate($exchange, $childNode);
		}

		return $node;
	}

	protected function trans(string $code, string $exchangeCode)
	{
		$translated = $this->translator->trans($code, [], 'exchange');
		return $translated === $code ? $this->translator->trans($code, [], $exchangeCode) : $translated;
	}

	public function getError(ExchangeInterface $exchange, ExchangeException $exception): ExchangeException
	{
		$message = $exception->getMessage();
		$additionalLoggerInfo = [];
		switch (get_class($exception))
		{
			case ConfigNotFoundException::class:
				$additionalLoggerInfo['%config_code%'] = $this->translator->trans($exception->getConfigCode() . ".NAME", [], $exchange->getCode(), $exchange->getLocale());
				break;

			case MappingNotFoundException::class:
				$additionalLoggerInfo['%identifiers%'] = implode(",", $exception->getIdentifiers());
				$additionalLoggerInfo["%mapping%"] = $this->translator->trans($exception->getMappingCode() . ".NAME", [], $exchange->getCode(), $exchange->getLocale());
				break;
			case MappingNotIncludedException::class:
				$additionalLoggerInfo["%mapping%"] = $this->translator->trans($exception->getMappingCode() . ".NAME", [], $exchange->getCode(), $exchange->getLocale());
				break;
		}


		$error = $this->translator->trans($message, array_merge($additionalLoggerInfo, [
			"%exchange%" => $exchange->getName()
		]), iikoExchangeBundle::BUNDLE_CODE, $exchange->getLocale());

		/** @var Restaurant|null $restaurant */
		$restaurant = WithRestaurantExtensionHelper::extractRestaurant($exchange);
		if ($restaurant)
		{
			$error .= " " . $this->translator->trans("RESTAURANT", ["%restaurant%" => $restaurant->getName()], iikoExchangeBundle::BUNDLE_CODE, $exchange->getLocale());
		}
		/** @var Period|null $period */
		$period = PeriodicalExtensionHelper::extractPeriod($exchange);
		if ($period)
		{
			$error .= " " . $this->translator->trans("PERIOD", ['%period%' => $period->getReadableRange()], iikoExchangeBundle::BUNDLE_CODE, $exchange->getLocale());
		}

		$exception->setMessage($error);


		$this->logger->error("Exchange error", ['error' => $error, 'exchangeId' => $exchange->getId(), 'exchangeUniq' => $exchange->getUniq(), 'params' => $additionalLoggerInfo]);

		return $exception;
	}

	/**
	 * @param bool $isDebug
	 */
	public function setIsDebug(bool $isDebug): void
	{
		$this->isDebug = $isDebug;
	}
}