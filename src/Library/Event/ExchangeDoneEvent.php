<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Exchange\Exchange;

class ExchangeDoneEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.done';

	public function __construct(Exchange $exchange, string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->scheduleType = $scheduleType;
	}
}