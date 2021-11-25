<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeErrorEvent extends Event implements ExchangeEventInterface
{
	const NAME = 'exchange.error';
	/**
	 * @var Exchange
	 */
	private Exchange $exchange;
	private ExchangeException $exception;

	public function __construct(Exchange $exchange, ExchangeException $exception)
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
	 * @return ExchangeException
	 */
	public function getException(): ExchangeException
	{
		return $this->exception;
	}

	/**
	 * @param ExchangeException $exception
	 * @return ExchangeErrorEvent
	 */
	public function setException(ExchangeException $exception): ExchangeErrorEvent
	{
		$this->exception = $exception;
		return $this;
	}


}