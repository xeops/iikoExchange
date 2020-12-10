<?php


namespace iikoExchangeBundle\Service;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Event\ExchangeDoneEvent;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeProcessManagerService
{
	private array $cache;

	public function engineDone(Exchange $exchange, ExchangeEngine $exchangeEngine): void
	{
		$this->saveStatusInCache($exchange, $exchangeEngine);
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