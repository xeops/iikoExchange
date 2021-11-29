<?php

namespace iikoExchangeBundle\Event;

use iikoExchangeBundle\Contract\Event\ExchangeEventInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use Symfony\Component\EventDispatcher\Event;

class BaseExchangeEvent extends Event implements ExchangeEventInterface
{

	protected ExchangeInterface $exchange;
	protected string $scheduleType;

	public function getExchange(): ExchangeInterface
	{
		return $this->exchange;
	}

	public function scheduleType(): string
	{
		return $this->scheduleType;
	}
}