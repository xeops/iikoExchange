<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineTransformDataEvent extends Event  implements ExchangeEventInterface
{
	const NAME = 'exchange.engine.transform';

	/**
	 * @var Exchange
	 */
	private Exchange $exchange;
	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $exchangeEngine;


	public function __construct(Exchange $exchange, ExchangeEngine $exchangeEngine)
	{
		$this->exchange = $exchange;
		$this->exchangeEngine = $exchangeEngine;
	}

	/**
	 * @return Exchange
	 */
	public function getExchange(): Exchange
	{
		return $this->exchange;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getExchangeEngine(): ExchangeEngine
	{
		return $this->exchangeEngine;
	}

}