<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineProcessEvent;
use Psr\Log\LoggerInterface;

class ExchangeEngineProcessEventTrigger
{
	public function onExchangeEngineProcess(ExchangeEngineProcessEvent $event)
	{
		$event->getExchange();
	}
}