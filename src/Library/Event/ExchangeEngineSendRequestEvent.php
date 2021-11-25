<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Request\DataSourceRequest;
use Symfony\Component\EventDispatcher\Event;

class ExchangeEngineSendRequestEvent extends Event  implements ExchangeEventInterface
{
	const NAME = 'exchange.engine.sendRequest';
	/**
	 * @var Exchange
	 */
	private Exchange $exchange;
	/**
	 * @var ExchangeEngine
	 */
	private ExchangeEngine $engine;
	/**
	 * @var ExchangeRequestInterface
	 */
	private ExchangeRequestInterface $dataSourceRequest;

	public function __construct(Exchange $exchange, ExchangeRequestInterface $dataSourceRequest)
	{
		$this->exchange = $exchange;
		$this->dataSourceRequest = $dataSourceRequest;
	}

	/**
	 * @return Exchange
	 */
	public function getExchange(): Exchange
	{
		return $this->exchange;
	}


	/**
	 * @return ExchangeRequestInterface
	 */
	public function getDataSourceRequest(): ExchangeRequestInterface
	{
		return $this->dataSourceRequest;
	}


}