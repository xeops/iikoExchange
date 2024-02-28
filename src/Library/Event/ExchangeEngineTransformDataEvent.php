<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineTransformDataEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.transform';


	private ExchangeEngineInterface $exchangeEngine;


	public function __construct(Exchange $exchange, ExchangeEngineInterface $exchangeEngine,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
		$this->scheduleType = $scheduleType;
	}


	public function getExchangeEngine(): ExchangeEngineInterface
	{
		return $this->exchangeEngine;
	}

}