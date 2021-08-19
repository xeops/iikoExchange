<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Contracts\EventDispatcher\Event;

class ExchangeEngineRunEvent extends Event  implements ExchangeEventInterface
{
	const NAME = 'exchange.engine.run';
	/** @var ExchangeEngine */
	private ExchangeEngine $engine;

	/** @var Exchange */
	private Exchange $exchange;

	public function __construct(Exchange $exchange, ExchangeEngine $engine)
	{
		$this->engine = $engine;
		$this->exchange = $exchange;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getEngine(): ExchangeEngine
	{
		return $this->engine;
	}

	/**
	 * @return Exchange
	 */
	public function getExchange(): Exchange
	{
		return $this->exchange;
	}
}
