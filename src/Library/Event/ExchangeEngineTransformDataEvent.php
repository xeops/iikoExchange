<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineTransformDataEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.transform';

	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $exchangeEngine;


	public function __construct(Exchange $exchange, ExchangeEngine $exchangeEngine,  string $scheduleType)
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