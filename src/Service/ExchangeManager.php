<?php


namespace iikoExchangeBundle\Service;

use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\ExchangeParametersInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithMultiRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
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
use iikoExchangeBundle\Exception\StartUpParameterNotFound;
use iikoExchangeBundle\ExtensionHelper\PeriodicalExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRestaurantExtensionHelper;
use iikoExchangeBundle\iikoExchangeBundle;
use iikoExchangeBundle\Library\Request\RequestResponseCollection;
use iikoExchangeBundle\Library\Request\RequestResponseItem;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Translation\TranslatorInterface;

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
			$this->fillConfiguration($exchange, $node);
			$this->fillMapping($exchange, $node);
		}

		try
		{
			$this->runExchange($exchange, $scheduleType);
		}

		catch (ExchangeException $exception)
		{

			$this->logger->critical('Exchange exception', ['type' => get_class($exception), 'exchangeCode' => $exchange->getCode(), 'exception' => $exception->getMessage()]);
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
			$this->logger->critical('Exchange exception', ['type' => get_class($exception), 'exchangeCode' => $exchange->getCode(), 'exchangeUniq' => $exchange->getUniq(), 'exchangeId' => $exchange->getId(), 'exception' => $exception->getMessage(), 'file' => $exception->getFile(), 'line' => $exception->getLine()]);
			$error = (new ExchangeException($this->isDebug ? $exception->getMessage() : 'SERVER_ERROR'))->setExchange($exchange);
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

		$this->dispatcher->dispatch('exchange.done', new ExchangeDoneEvent($exchange, $scheduleType));
		return true;
	}

	private function runExchange(ExchangeInterface $exchange, string $scheduleType)
	{
		$this->dispatcher->dispatch('exchange.start', new ExchangeStartEvent($exchange, $scheduleType));

		$data = new RequestResponseCollection;

		foreach ($exchange->getEngines() as $engine)
		{
			/** @var ExchangeEngineInterface $engine */
			foreach ($engine->getRequests() as $request)
			{
				if ($engine instanceof WithMultiRestaurantExtensionInterface)
				{
					foreach ($engine->getRestaurantCollection() as $restaurant)
					{
						WithRestaurantExtensionHelper::setRestaurantForExchangeNode($request, $restaurant);
						$this->callRequest($exchange, $scheduleType, $request, $data);
					}
				}
				else
				{
					$this->callRequest($exchange, $scheduleType, $request, $data);
				}
			}

			$this->dispatcher->dispatch('exchange.engine.transform', new ExchangeEngineTransformDataEvent($exchange, $engine, $scheduleType));
			$transformed = $engine->getTransformer()->transform($exchange, $engine, $data->withFilter(
				fn(RequestResponseItem $item) => in_array($item->getRequestCode(), array_map(
					fn(ExchangeRequestInterface $request) => $request->getCode(), $engine->getRequests()))));

			if ($scheduleType === ScheduleInterface::TYPE_PREVIEW)
			{
				$this->previewStorage->saveData($exchange, $engine, $transformed);
			}
			else
			{
				$this->dispatcher->dispatch('exchange.engine.format', new ExchangeEngineFormatEvent($exchange, $engine, $transformed, $scheduleType));
				$formatted = $engine->getFormatter()->getFormattedData($exchange, $transformed);
				$this->dispatcher->dispatch('exchange.engine.load', new ExchangeEngineLoadEvent($exchange, $engine, $transformed, $scheduleType));
				$exchange->getLoader()->sendRequest($formatted);
			}
			$this->dispatcher->dispatch('exchange.engine.dataDone', new ExchangeEngineDataDoneEvent($exchange, $engine, $scheduleType));
		}
	}

	protected function callRequest(ExchangeInterface $exchange, string $scheduleType, ExchangeRequestInterface $request, RequestResponseCollection $collection)
	{
		if (WithRestaurantExtensionHelper::isNeedRestaurant($request))
		{
			if ($collection->exist($request->getCode(), WithRestaurantExtensionHelper::extractRestaurant($request)->getId()))
			{
				return;
			}
			if (PeriodicalExtensionHelper::isNeedPeriod($request))
			{
				$period = PeriodicalExtensionHelper::extractPeriod($exchange);
				if ($period->getDateFrom()->format('H:i:s') !== '00:00:00' || $period->getDateTo()->format('H:i:s') !== '00:00:00')
				{
					$period->withTimeZone(WithRestaurantExtensionHelper::extractRestaurant($request)->getDateTimeZone());
				}
				PeriodicalExtensionHelper::setPeriodForExchangeNode($request, $period);
			}
		}

		$this->dispatcher->dispatch('exchange.engine.sendRequest', new ExchangeEngineSendRequestEvent($exchange, $request, $scheduleType));
		$response = $exchange->getExtractor()->sendRequest($request);
		if ($response->getStatusCode() !== 200 || is_null($response->getBody()))
		{
			throw new EngineNotFoundDataException();
		}

		$collection->add(new RequestResponseItem(
			$request->getCode(),
			$request->processResponse($response->getBody()->getContents()),
			PeriodicalExtensionHelper::extractPeriod($request),
			WithRestaurantExtensionHelper::extractRestaurant($request)
		));

	}


	private function fillConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $node)
	{
		if ($node instanceof ConfigurableExtensionInterface)
		{
			$restaurant = null;
			if ($node instanceof WithRestaurantExtensionInterface)
			{
				$restaurant = $node->getRestaurant();
			}
			$node->setConfigCollection($this->configStorage->getConfiguration($exchange, $node, $restaurant));
		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->fillConfiguration($exchange, $childNode);
		}
	}

	private function fillMapping(ExchangeInterface $exchange, ExchangeNodeInterface $node)
	{
		if ($node instanceof WithMappingExtensionInterface)
		{
			$restaurant = null;
			if ($node instanceof WithRestaurantExtensionInterface)
			{
				$restaurant = $node->getRestaurant();
			}

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
			$this->fillMapping($exchange, $childNode);
		}
	}


	private function setParams(ExchangeInterface $exchange, ExchangeParametersInterface $params): void
	{
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

		if (WithRestaurantExtensionHelper::isNeedRestaurant($exchange))
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
		$node->setName($this->translator->trans($node->getCode() . ".NAME", [], $exchange->getCode()));
		$node->setDescription($this->translator->trans($node->getCode() . ".DESCRIPTION", [], $exchange->getCode()));

		if ($node instanceof ConfigurableExtensionInterface)
		{
			foreach ($node->getConfiguration() as $configItem)
			{
				$configItem->setName($this->translator->trans($configItem->getCode() . ".NAME", [], $exchange->getCode()));
				$configItem->setDescription($this->translator->trans($configItem->getCode() . ".DESCRIPTION", [], $exchange->getCode()));
			}
		}
		if ($node instanceof WithMappingExtensionInterface)
		{
			foreach ($node->getMapping() as $mapping)
			{
				$mapping->setName($this->translator->trans($mapping->getCode() . ".NAME", [], $exchange->getCode()));
				$mapping->setDescription($this->translator->trans($mapping->getCode() . ".DESCRIPTION", [], $exchange->getCode()));

				foreach ($mapping->getExposedIdentifiers() as $identifier)
				{
					$identifier->setName($this->translator->trans($identifier->getCode() . ".NAME", [], $exchange->getCode()));
					$identifier->setDescription($this->translator->trans($identifier->getCode() . ".DESCRIPTION", [], $exchange->getCode()));
				}
				foreach ($mapping->getExposedValues() as $value)
				{
					$value->setName($this->translator->trans($value->getCode() . ".NAME", [], $exchange->getCode()));
					$value->setDescription($this->translator->trans($value->getCode() . ".DESCRIPTION", [], $exchange->getCode()));
				}
			}
		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->translate($exchange, $childNode);
		}

		return $node;
	}

	public function getError(ExchangeInterface $exchange, ExchangeException $exception): ExchangeException
	{
		$message = $exception->getMessage();
		$additionalLoggerInfo = [];
		switch (get_class($exception))
		{
			case ConfigNotFoundException::class:
				$additionalLoggerInfo['%config_code%'] = $this->translator->trans($exception->getConfigCode() . ".NAME", [], $exchange->getCode());
				break;

			case MappingNotFoundException::class:
				$additionalLoggerInfo['%identifiers%'] = implode(",", $exception->getIdentifiers());
				$additionalLoggerInfo["%mapping%"] = $this->translator->trans($exception->getMappingCode() . ".NAME", [], $exchange->getCode());
				break;
		}


		$error = $this->translator->trans($message, array_merge($additionalLoggerInfo, [
			"%exchange%" => $exchange->getName()
		]), iikoExchangeBundle::BUNDLE_CODE);

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