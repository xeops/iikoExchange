<?php


namespace iikoExchangeBundle\Service;


use iikoExchangeBundle\Engine\ExchangeEngine;

class ExchangeEngineDataManager
{
	private array $cache;

	public function setData(ExchangeEngine $engine, $data)
	{
		$this->cache[$engine->getCode()] = $data;
	}
}