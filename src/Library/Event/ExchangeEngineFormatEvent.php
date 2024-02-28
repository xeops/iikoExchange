<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Format\Formatter;

class ExchangeEngineFormatEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.format';


	private $data;
	/**
	 * @var ExchangeEngineInterface
	 */
	private ExchangeEngineInterface $engine;

	public function __construct(Exchange $exchange, ExchangeEngineInterface $engine, $data,  string $scheduleType)
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
	 * @return ExchangeEngineInterface
	 */
	public function getEngine(): ExchangeEngineInterface
	{
		return $this->engine;
	}
}