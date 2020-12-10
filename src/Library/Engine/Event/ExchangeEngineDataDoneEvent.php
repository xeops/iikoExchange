<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineDataDoneEvent extends Event
{
	const NAME = 'exchange.engine.dataDone';
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
	 * @param Exchange $exchange
	 * @return ExchangeEngineDataDoneEvent
	 */
	public function setExchange(Exchange $exchange): ExchangeEngineDataDoneEvent
	{
		$this->exchange = $exchange;
		return $this;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getExchangeEngine(): ExchangeEngine
	{
		return $this->exchangeEngine;
	}

	/**
	 * @param ExchangeEngine $exchangeEngine
	 * @return ExchangeEngineDataDoneEvent
	 */
	public function setExchangeEngine(ExchangeEngine $exchangeEngine): ExchangeEngineDataDoneEvent
	{
		$this->exchangeEngine = $exchangeEngine;
		return $this;
	}
}