<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeEngineLoadEvent extends  BaseExchangeEvent
{
	const NAME = 'exchange.engine.load';

	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngineInterface $exchangeEngine;

	private $data;

	public function __construct(Exchange $exchange, ExchangeEngineInterface $exchangeEngine, $data,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->data = $data;
		$this->scheduleType = $scheduleType;
	}


	/**
	 * @return ExchangeEngineInterface
	 */
	public function getEngine(): ExchangeEngineInterface
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