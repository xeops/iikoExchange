<?php


namespace iikoExchangeBundle\Service;

use iikoExchangeBundle\Application\Calendar;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Service\ExchangeDataStorageInterface;
use iikoExchangeBundle\Engine\Event\ExchangeEngineDoneEvent;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Event\ExchangeDoneEvent;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\ExtensionHelper\PeriodicalExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRestaurantExtensionHelper;
use Symfony\Component\EventDispatcher\EventDispatcher;

class ExchangeProcessManagerService
{
	private ExchangeDataStorageInterface $storage;
	private ExchangeDirectoryService $exchangeDirectory;
	private EventDispatcher $dispatcher;
	/**
	 * Метод для запуска обмена.
	 * @param string $exchangeCode - уникальный код обмена
	 * @param string $scheduleType - тип расписания. @see ExchangeInterface::EXECUTION_*
	 * @param array $params - параметры запуска. Для обменов, требующих работу с периодом и/или рестораном обязательная передача параметров
	 * @param int $id
	 * @throws \Exception
	 */
	public function startExchange(string $exchangeCode, string $scheduleType, array $params = [], int $id = 1)
	{
		$exchange =  clone $this->exchangeDirectory->getExchangeByCode($exchangeCode);

		if (PeriodicalExtensionHelper::isNeedPeriod($exchange))
		{
			/** @var Calendar $period */
			$period = $params[Exchange::PARAM_PERIOD];

			if (!array_key_exists(Exchange::PARAM_PERIOD, $params) || !($params[Exchange::PARAM_PERIOD] instanceof Calendar))
			{
				throw new \Exception('Period must be set');
			}
			PeriodicalExtensionHelper::setPeriodForExchangeNode($exchange, $params[Exchange::PARAM_PERIOD]);
		}

		if (WithRestaurantExtensionHelper::isNeedRestaurant($exchange))
		{
			if (!array_key_exists(Exchange::PARAM_RESTAURANT, $params) || !($params[Exchange::PARAM_RESTAURANT] instanceof Restaurant))
			{
				throw new \Exception('Restaurant must be set');
			}
			WithRestaurantExtensionHelper::setRestaurantForExchangeNode($exchange, $params[Exchange::PARAM_RESTAURANT]);
		}

		foreach ($exchange->getEngines() as $engine)
		{
			foreach ($engine->getRequests() as $request)
			{
				$data = $exchange->getExtractor()->sendRequest($request);
			}

			$exchange->getLoader()->sendRequest($request);
		}

	}

	private array $cache;

	public function engineDone(ExchangeEngineDoneEvent $engineDoneEvent): void
	{
		$this->saveStatusInCache($engineDoneEvent->getExchange(), $engineDoneEvent->getExchangeEngine());
	}

	public function isAllEngineDone(Exchange $exchange): bool
	{
		if (!$this->cacheExistForExchange($exchange))
		{
			return false;
		}
		foreach ($exchange->getEngines() as $engine)
		{
			if (!$this->cacheExistForEngine($exchange, $engine))
			{
				return false;
			}
		}
		return true;
	}

	protected function cacheExistForExchange(Exchange $exchange): bool
	{
		return array_key_exists($exchange->getUniq(), $this->cache);
	}

	protected function cacheExistForEngine(Exchange $exchange, ExchangeEngine $exchangeEngine)
	{
		return array_key_exists($exchangeEngine->getCode(), $this->cache[$exchange->getUniq()]);
	}

	protected function saveStatusInCache(Exchange $exchange, ExchangeEngine $exchangeEngine): void
	{
		$this->cache[$exchange->getUniq()] ??= [];
		$this->cache[$exchange->getUniq()][$exchangeEngine->getCode()] = 1;
	}

	protected function clearCacheForExchange(Exchange $exchange)
	{
		unset($this->cache[$exchange->getUniq()]);
	}


	public function onExchangeDone(ExchangeDoneEvent $event)
	{
		$this->clearCacheForExchange($event->getExchange());
	}
}