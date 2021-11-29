<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Provider\Provider;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineLoadEvent extends  BaseExchangeEvent
{
	const NAME = 'exchange.engine.load';

	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $exchangeEngine;

	private $data;

	public function __construct(Exchange $exchange, ExchangeEngine $exchangeEngine, $data,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->data = $data;
		$this->scheduleType = $scheduleType;
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