<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineRunEvent extends  BaseExchangeEvent
{
	const NAME = 'exchange.engine.run';
	/** @var ExchangeEngine */
	private ExchangeEngine $engine;


	public function __construct(Exchange $exchange, ExchangeEngine $engine,  string $scheduleType)
	{
		$this->engine = $engine;
		$this->exchange = $exchange;
		$this->scheduleType = $scheduleType;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getEngine(): ExchangeEngine
	{
		return $this->engine;
	}

}