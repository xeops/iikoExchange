<?php

namespace iikoExchangeBundle\Exception;


use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

class ExchangeException extends \Exception
{
	protected ExchangeInterface $exchange;

	/**
	 * @param ExchangeInterface $exchange
	 */
	public function setExchange(ExchangeInterface $exchange): ExchangeException
	{
		$this->exchange = $exchange;
		return $this;
	}

	/**
	 * @return ExchangeInterface
	 */
	public function getExchange(): ExchangeInterface
	{
		return $this->exchange;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage($message): void
	{
		$this->message = $message;
	}


}