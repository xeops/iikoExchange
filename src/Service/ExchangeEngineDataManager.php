<?php


namespace iikoExchangeBundle\Service;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Event\ExchangeDoneEvent;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Request\DataSourceRequest;

class ExchangeEngineDataManager
{
	private array $cache;

	public function setData(Exchange $exchange, DataSourceRequest $request, $data)
	{
		$this->cache[$this->getKey($exchange, $request)] = $data;
	}

	public function isCacheFull(Exchange $exchange, ?ExchangeEngine $engine = null)
	{
		$engines = $engine === null ? $exchange->getEngines() : [$engine];
		foreach ($engines as $engine)
		{
			foreach ($engine->getRequests() as $request)
			{
				if (!$this->cacheExistForEngine($exchange, $request))
				{
					return false;
				}
			}
		}
		return true;
	}

	public function getCachedDataForEngine(Exchange $exchange, ExchangeEngine $exchangeEngine)
	{
		$result = [];
		foreach ($exchangeEngine->getRequests() as $request)
		{
			$result[$request->getCode()] = $this->getItemFromCache($exchange, $request);
		}
		return $result;
	}

	public function getCachedData(Exchange $exchange): array
	{
		$result = [];
		foreach ($exchange->getEngines() as $engine)
		{
			$result[$engine->getCode()] = $this->getCachedDataForEngine($exchange, $engine);
		}
		return $result;
	}

	protected function getItemFromCache(Exchange $exchange, DataSourceRequest $request)
	{
		return $this->cache[$this->getKey($exchange, $request)] ?? null;
	}

	protected function cacheExistForEngine(Exchange $exchange, DataSourceRequest $request)
	{
		return array_key_exists($this->getKey($exchange, $request), $this->cache);
	}

	protected function getKey(Exchange $exchange, DataSourceRequest $request): string
	{
		return $exchange->getCode() . "@" . $exchange->getUniq() . "@" . $request->getCode();
	}

	protected function clearCacheForExchange(Exchange $exchange)
	{
		foreach ($exchange->getEngines() as $engine)
		{
			foreach ($engine->getRequests() as $request)
			{
				if (array_key_exists($this->getKey($exchange, $request), $this->cache))
				{
					unset($this->cache[$this->getKey($exchange, $request)]);
				}
			}
		}
	}


	public function onExchangeDone(ExchangeDoneEvent $event)
	{
		$this->clearCacheForExchange($event->getExchange());
	}
}