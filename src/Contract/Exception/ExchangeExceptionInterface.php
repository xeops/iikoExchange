<?php


namespace iikoExchangeBundle\Contract\Exception;


use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface ExchangeExceptionInterface
{
	public function setExchange(ExchangeInterface $exchange) : ExchangeExceptionInterface;

	public function getExchange(): ExchangeInterface;
}