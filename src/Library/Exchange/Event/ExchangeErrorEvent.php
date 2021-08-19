<?php


namespace iikoExchangeBundle\Exchange\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Contracts\EventDispatcher\Event;

class ExchangeErrorEvent extends Event implements ExchangeEventInterface
{
	const NAME = 'exchange.error';
	/**
	 * @var Exchange
	 */
	private Exchange $exchange;
	private \Exception $exception;

	public function __construct(Exchange $exchange, \Exception $exception)
	{
		$this->exchange = $exchange;
		$this->exception = $exception;
	}

	/**
	 * @return Exchange
	 */
	public function getExchange(): Exchange
	{
		return $this->exchange;
	}

	/**
	 * @return \Exception
	 */
	public function getException(): \Exception
	{
		return $this->exception;
	}

}
