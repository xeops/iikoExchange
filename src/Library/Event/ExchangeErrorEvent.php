<?php


namespace iikoExchangeBundle\Event;


use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\Event;

class ExchangeErrorEvent extends BaseExchangeEvent
{
	const NAME = 'exchange.error';

	private ExchangeException $exception;

	public function __construct(Exchange $exchange, ExchangeException $exception,  string $scheduleType)
	{
		$this->exchange = $exchange;
		$this->exception = $exception;
		$this->scheduleType = $scheduleType;
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