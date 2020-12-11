<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineProcessEvent extends Event
{
	const NAME = 'exchange.engine.process';
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
	 * @return ExchangeEngineProcessEvent
	 */
	public function setExchange(Exchange $exchange): ExchangeEngineProcessEvent
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
	 * @return ExchangeEngineProcessEvent
	 */
	public function setExchangeEngine(ExchangeEngine $exchangeEngine): ExchangeEngineProcessEvent
	{
		$this->exchangeEngine = $exchangeEngine;
		return $this;
	}


}