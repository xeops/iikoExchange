<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Format\Formatter;
use Symfony\Contracts\EventDispatcher\Event;

class ExchangeEngineFormatEvent extends Event  implements ExchangeEventInterface
{
	const NAME = 'exchange.engine.format';
	/**
	 * @var Exchange
	 */
	private Exchange $exchange;


	private $data;
	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $engine;

	public function __construct(Exchange $exchange, ExchangeEngine $engine, $data)
	{
		$this->exchange = $exchange;
		$this->data = $data;
		$this->engine = $engine;
	}

	public function getExchange(): Exchange
	{
		return $this->exchange;
	}

	public function getFormatter(): Formatter
	{
		return $this->engine->getFormatter();
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @return ExchangeEngine
	 */
	public function getEngine(): ExchangeEngine
	{
		return $this->engine;
	}
}
