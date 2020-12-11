<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeEngineDoneEvent
{
	const NAME = 'exchange.engine.done';
	/**
	 * @var Exchange
	 */
	private Exchange $exchange;
	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $exchangeEngine;

	public function __construct(Exchange $exchange, ExchangeEngine $exchangeEngine)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
	}

	/**
	 * @return Exchange
	 */
	public function getExchange(): Exchange
	{
		return $this->exchange;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getExchangeEngine(): ExchangeEngine
	{
		return $this->exchangeEngine;
	}


}