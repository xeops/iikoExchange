<?php


namespace iikoExchangeBundle\Exception;


use iikoExchangeBundle\Contract\Exception\ExchangeExceptionInterface;

class ConnectionException extends \Exception implements ExchangeExceptionInterface
{
	/**
	 * @param mixed $message
	 */
	public function setMessage($message): void
	{
		$this->message = $message;
	}

}