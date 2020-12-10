<?php


namespace iikoExchangeBundle\Exchange\Event;


use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeDoneEvent extends Event
{
	const NAME = 'exchange.done';
	/**
	 * @var Exchange
	 */
	private Exchange $exchange;

	public function __construct(Exchange $exchange)
	{
		$this->exchange = $exchange;
	}

	/**
	 * @return Exchange
	 */
	public function getExchange(): Exchange
	{
		return $this->exchange;
	}
}