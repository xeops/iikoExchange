<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeEngineSendRequestEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.sendRequest';

	/**
	 * @var ExchangeRequestInterface
	 */
	private ExchangeRequestInterface $dataSourceRequest;
	private ExchangeEngineInterface $engine;

	public function __construct(Exchange $exchange, ExchangeEngineInterface $engine, $dataSourceRequest,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->dataSourceRequest = $dataSourceRequest;
		$this->scheduleType = $scheduleType;
		$this->engine = $engine;
	}


	public function getDataSourceRequest()
	{
		return $this->dataSourceRequest;
	}

	/**
	 * @return ExchangeEngineInterface
	 */
	public function getEngine(): ExchangeEngineInterface
	{
		return $this->engine;
	}

}