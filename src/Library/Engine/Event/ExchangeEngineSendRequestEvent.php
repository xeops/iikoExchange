<?php


namespace iikoExchangeBundle\Engine\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Request\DataSourceRequest;
use Symfony\Contracts\EventDispatcher\Event;

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
	 * @var DataSourceRequest
	 */
	private DataSourceRequest $dataSourceRequest;

	public function __construct(Exchange $exchange, DataSourceRequest $dataSourceRequest)
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
	 * @return DataSourceRequest
	 */
	public function getDataSourceRequest(): DataSourceRequest
	{
		return $this->dataSourceRequest;
	}


}
