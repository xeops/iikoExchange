<?php


namespace iikoExchangeBundle\Service;

use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\ExchangeParametersInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Service\ExchangeConfigStorageInterface;
use iikoExchangeBundle\Contract\Service\EngineDataStorageInterface;
use iikoExchangeBundle\Contract\Service\ExchangeMappingStorageInterface;
use iikoExchangeBundle\Exception\ConfigNotFoundException;
use iikoExchangeBundle\Exception\ConnectionException;
use iikoExchangeBundle\Exception\EngineNotFoundDataException;
use iikoExchangeBundle\Exception\MappingNotFoundException;
use iikoExchangeBundle\Exception\StartUpParameterNotFound;
use iikoExchangeBundle\ExtensionHelper\PeriodicalExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRestaurantExtensionHelper;
use Symfony\Component\EventDispatcher\EventDispatcher;

class ExchangeProcessManagerService
{
	private EngineDataStorageInterface $dataStorage;
	private ExchangeDirectoryService $exchangeDirectory;
	private ExchangeConfigStorageInterface $configStorage;
	private ExchangeMappingStorageInterface $mappingStorage;
	private EventDispatcher $dispatcher;

	/**
	 * Метод для запуска обмена.
	 * @param string $exchangeCode - уникальный код обмена
	 * @param string $scheduleType - тип расписания. @see ExchangeInterface::EXECUTION_*
	 * @param array $params - параметры запуска. Для обменов, требующих работу с периодом и/или рестораном обязательная передача параметров
	 * @param int $id
	 * @throws \Exception
	 */
	public function startExchange(string $exchangeCode, string $scheduleType, ExchangeParametersInterface $params, int $id = 1)
	{
		$exchange = $this->exchangeDirectory->getExchangeByCode($exchangeCode);
		$exchange->setId($id);

		$this->setParams($exchange, $params);

		foreach ($exchange->getChildNodes() as $node)
		{
			$this->fillConfiguration($exchange, $node);
			$this->fillMapping($exchange, $node);
		}

		try
		{
			$this->runExchange($exchange);
		}
		catch (ConnectionException $connectionException)
		{

		}
		catch (MappingNotFoundException $mappingNotFoundException)
		{

		}
		catch (ConfigNotFoundException $configNotFoundException)
		{

		}
		catch (EngineNotFoundDataException $engineNotFoundDataException)
		{

		}
		catch (\Exception $exception)
		{

		}
		catch (\Throwable $throwable)
		{

		}


	}

	private function runExchange(ExchangeInterface $exchange)
	{
		foreach ($exchange->getRequests() as $request)
		{
			$this->dataStorage->saveData($exchange, $request, $exchange->getLoader()->sendRequest($request));
		}

		foreach ($exchange->getEngines() as $engine)
		{
			$data = [];

			foreach ($engine->getRequests() as $request)
			{
				if (!$this->dataStorage->existData($exchange, $request))
				{
					throw new EngineNotFoundDataException();
				}

				$data[$request->getCode()] = $this->dataStorage->getData($exchange, $request);
			}

			$transformed = $engine->getTransformer()->transform($exchange, $engine, $data);
			$formatted = $engine->getFormatter()->getFormattedData($exchange, $transformed);

			$exchange->getLoader()->sendRequest();

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
				$node->setMappingValues($mapping->getCode(), $this->mappingStorage->getMapping($exchange, $mapping->getCode(), $restaurant));
			}

		}
		foreach ($node->getChildNodes() as $childNode)
		{
			$this->fillConfiguration($exchange, $childNode);
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
}