<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeEngineDoneEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.done';

	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $exchangeEngine;

	public function __construct(Exchange $exchange, ExchangeEngine $exchangeEngine, string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->scheduleType = $scheduleType;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getExchangeEngine(): ExchangeEngine
	{
		return $this->exchangeEngine;
	}


}