<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineSendRequestEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.engine.sendRequest';

	/**
	 * @var ExchangeRequestInterface
	 */
	private ExchangeRequestInterface $dataSourceRequest;

	public function __construct(Exchange $exchange, $dataSourceRequest,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->dataSourceRequest = $dataSourceRequest;
		$this->scheduleType = $scheduleType;
	}


	public function getDataSourceRequest()
	{
		return $this->dataSourceRequest;
	}


}