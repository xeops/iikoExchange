<?php

namespace iikoExchangeBundle\Exception;

use iikoExchangeBundle\Contract\Exception\ExchangeExceptionInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

abstract class BaseExchangeException extends \Exception implements ExchangeExceptionInterface
{
	protected ExchangeInterface $exchange;

	/**
	 * @param ExchangeInterface $exchange
	 */
	public function setExchange(ExchangeInterface $exchange): ExchangeExceptionInterface
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


}