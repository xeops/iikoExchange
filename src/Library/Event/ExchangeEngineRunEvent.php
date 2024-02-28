<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineRunEvent extends  BaseExchangeEvent
{
	const NAME = 'exchange.engine.run';
	/** @var ExchangeEngineInterface */
	private ExchangeEngineInterface $engine;


	public function __construct(Exchange $exchange, ExchangeEngineInterface $engine,  string $scheduleType)
	{
		$this->engine = $engine;
		$this->exchange = $exchange;
		$this->scheduleType = $scheduleType;
	}

	/**
	 * @return ExchangeEngineInterface
	 */
	public function getEngine(): ExchangeEngineInterface
	{
		return $this->engine;
	}

}