<?php


namespace iikoExchangeBundle\Service;

use Exchange\ExchangeBundle\Entity\ExchangeItem;
use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\ExchangeParametersInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Contract\Schedule\ScheduleInterface;
use iikoExchangeBundle\Contract\Service\PreviewStorageInterface;
use iikoExchangeBundle\Contract\Service\ExchangeConfigStorageInterface;
use iikoExchangeBundle\Contract\Service\ExchangeMappingStorageInterface;
use iikoExchangeBundle\Event\ExchangeEngineDataDoneEvent;
use iikoExchangeBundle\Event\ExchangeEngineFormatEvent;
use iikoExchangeBundle\Event\ExchangeEngineLoadEvent;
use iikoExchangeBundle\Event\ExchangeEngineSendRequestEvent;
use iikoExchangeBundle\Event\ExchangeEngineTransformDataEvent;
use iikoExchangeBundle\Event\ExchangeErrorEvent;
use iikoExchangeBundle\Event\ExchangeStartEvent;
use iikoExchangeBundle\Exception\ConfigNotFoundException;
use iikoExchangeBundle\Exception\ConnectionException;
use iikoExchangeBundle\Exception\EngineNotFoundDataException;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\Exception\MappingNotFoundException;
use iikoExchangeBundle\Exception\StartUpParameterNotFound;
use iikoExchangeBundle\Event\ExchangeDoneEvent;

use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\ExtensionHelper\PeriodicalExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRestaurantExtensionHelper;
use iikoExchangeBundle\iikoExchangeBundle;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Translation\TranslatorInterface;

class ExchangeManager
{
	private ExchangeDirectoryService $exchangeDirectory;
	private ExchangeConfigStorageInterface $configStorage;
	private ExchangeMappingStorageInterface $mappingStorage;
	private EventDispatcherInterface $dispatcher;
	private LoggerInterface $logger;
	private TranslatorInterface $translator;
	private PreviewStorageInterface $previewStorage;

	/**
	 * @param PreviewStorageInterface $dataStorage
	 * @param ExchangeDirectoryService $exchangeDirectory
	 * @param ExchangeConfigStorageInterface $configStorage
	 * @param ExchangeMappingStorageInterface $mappingStorage
	 * @param EventDispatcherInterface $dispatcher
	 */
	public function __construct(ExchangeDirectoryService $exchangeDirectory, PreviewStorageInterface $previewStorage, ExchangeConfigStorageInterface $configStorage, ExchangeMappingStorageInterface $mappingStorage, EventDispatcherInterface $dispatcher, LoggerInterface $logger, TranslatorInterface $translator)
	{
		$this->exchangeDirectory = $exchangeDirectory;
		$this->configStorage = $configStorage;
		$this->mappingStorage = $mappingStorage;
		$this->dispatcher = $dispatcher;
		$this->logger = $logger;
		$this->translator = $translator;
		$this->previewStorage = $previewStorage;
	}


	/**
	 * Метод для запуска обмена.
	 * @param string $exchangeCode - уникальный код обмена
	 * @param string $scheduleType - тип расписания. @see ExchangeInterface::EXECUTION_*
	 * @param array $params - параметры запуска. Для обменов, требующих работу с периодом и/или рестораном обязательная передача параметров
	 * @param int $id
	 * @throws \Exception
	 */
	public function startExchange(ExchangeInterface $exchange, string $scheduleType, ExchangeParametersInterface $params): bool
	{
		$this->logger->debug('Exchange. Start', ['exchangeCode' => $exchange->getCode()]);

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
				$this->dispatch(new ExchangeErrorEvent($exchange, $error), $scheduleType);
			}
			return false;

		}
		catch (\Exception | \Throwable $exception)
		{
			$this->logger->critical('Exchange exception', ['type' => get_class($exception), 'exchangeCode' => $exchange->getCode(), 'exchangeUniq' => $exchange->getUniq(), 'exchangeId' => $exchange->getId(), 'exception' => $exception->getMessage(), 'file' => $exception->getFile(), 'line' => $exception->getLine()]);
			$error = (new ExchangeException('SERVER_ERROR'))->setExchange($exchange);
			if ($scheduleType === ScheduleInterface::TYPE_PREVIEW)
			{
				$this->previewStorage->error($exchange, $error->getMessage());
				$this->previewStorage->clearData($exchange);
			}
			else
			{
				$this->dispatch(new ExchangeErrorEvent($exchange, $error), $scheduleType);
			}
			return false;
		}

		$this->dispatch(new ExchangeDoneEvent($exchange), $scheduleType);
		return true;
	}

	private function runExchange(ExchangeInterface $exchange, string $scheduleType)
	{
		$this->dispatch(new ExchangeStartEvent($exchange), $scheduleType);
		$data = [];
		foreach ($exchange->getRequests() as $request)
		{
			$this->dispatch(new ExchangeEngineSendRequestEvent($exchange, $request), $scheduleType);
			$response = $exchange->getExtractor()->sendRequest($request);
			if ($response->getStatusCode() !== 200 || is_null($response->getBody()))
			{
				throw new EngineNotFoundDataException();
			}
			$data[$request->getCode()] = $request->processResponse($response->getBody()->getContents());
		}

		foreach ($exchange->getEngines() as $engine)
		{
			$this->dispatch(new ExchangeEngineTransformDataEvent($exchange, $engine), $scheduleType);
			$transformed = $engine->getTransformer()->transform($exchange, $engine, array_filter($data, fn($code) => in_array($code, array_map(fn(ExchangeRequestInterface $request) => $request->getCode(), $engine->getRequests()))));
			if ($scheduleType === ScheduleInterface::TYPE_PREVIEW)
			{
				$this->previewStorage->saveData($exchange, $engine, $transformed);
			}
			else
			{
				$this->dispatch(new ExchangeEngineFormatEvent($exchange, $engine, $transformed), $scheduleType);
				$formatted = $engine->getFormatter()->getFormattedData($exchange, $transformed);
				$this->dispatch(new ExchangeEngineLoadEvent($exchange, $engine, $transformed), $scheduleType);
				$exchange->getLoader()->sendRequest($formatted);
			}
			$this->dispatch(new ExchangeEngineDataDoneEvent($exchange, $engine), $scheduleType);
		}
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

	private function dispatch(Event $event, string $scheduleType)
	{
		if ($scheduleType !== ScheduleInterface::TYPE_PREVIEW)
		{
			$this->dispatcher->dispatch($event::NAME, $event);
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
		$message = $exception;
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
}