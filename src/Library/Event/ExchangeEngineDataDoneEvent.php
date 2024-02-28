<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeEngineDataDoneEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.dataDone';


	private ExchangeEngineInterface $exchangeEngine;

	public function __construct(Exchange $exchange, ExchangeEngineInterface $exchangeEngine,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->scheduleType = $scheduleType;
	}

	public function getExchangeEngine(): ExchangeEngineInterface
	{
		return $this->exchangeEngine;
	}
}