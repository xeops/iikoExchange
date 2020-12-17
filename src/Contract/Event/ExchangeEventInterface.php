<?php


namespace iikoExchangeBundle\Contract\Event;


use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface ExchangeEventInterface
{
	public function getExchange() : ExchangeInterface;
}