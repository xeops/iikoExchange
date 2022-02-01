<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeStartEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.start';


	public function __construct(Exchange $exchange, string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->scheduleType = $scheduleType;
	}
}