<?php


namespace iikoExchangeBundle\Exchange\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Contracts\EventDispatcher\Event;

class ExchangeProcessEvent extends Event implements ExchangeEventInterface
{
	const NAME = 'exchange.process';

	protected Exchange $exchange;

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
