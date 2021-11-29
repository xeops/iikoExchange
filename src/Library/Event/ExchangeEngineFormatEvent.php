<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Format\Formatter;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineFormatEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.format';


	private $data;
	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $engine;

	public function __construct(Exchange $exchange, ExchangeEngine $engine, $data,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->data = $data;
		$this->engine = $engine;
		$this->scheduleType = $scheduleType;
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