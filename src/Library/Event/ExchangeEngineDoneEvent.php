<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeEngineDoneEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.done';

	/**
	 * @var ExchangeEngineInterface
	 */
	private ExchangeEngineInterface $exchangeEngine;

	public function __construct(Exchange $exchange, ExchangeEngineInterface $exchangeEngine, string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->scheduleType = $scheduleType;
	}

	/**
	 * @return ExchangeEngineInterface
	 */
	public function getExchangeEngine(): ExchangeEngineInterface
	{
		return $this->exchangeEngine;
	}


}