<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineSendRequestEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.sendRequest';

	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $engine;
	/**
	 * @var ExchangeRequestInterface
	 */
	private ExchangeRequestInterface $dataSourceRequest;

	public function __construct(Exchange $exchange, ExchangeRequestInterface $dataSourceRequest,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->dataSourceRequest = $dataSourceRequest;
		$this->scheduleType = $scheduleType;
	}



	/**
	 * @return ExchangeRequestInterface
	 */
	public function getDataSourceRequest(): ExchangeRequestInterface
	{
		return $this->dataSourceRequest;
	}


}