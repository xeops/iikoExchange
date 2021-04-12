<?php


namespace iikoExchangeBundle\Contract\Exception;


interface ExchangeExceptionInterface
{
	/**
	 * @param mixed $message
	 */
	public function setMessage($message): void;

}