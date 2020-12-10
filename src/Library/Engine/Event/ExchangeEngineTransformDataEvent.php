<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineTransformDataEvent extends Event
{
	const NAME = 'exchange.engine.transform';

	/**
	 * @var Exchange
	 */
	private Exchange $exchange;
	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $exchangeEngine;
	private $data;

	public function __construct(Exchange $exchange, ExchangeEngine $exchangeEngine, $data)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->data = $data;
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

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}


}