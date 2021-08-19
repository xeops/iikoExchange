<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineDataDoneEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineTransformDataEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeEngineDataDoneEventTrigger
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(EventDispatcherInterface $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}

	public function onDataFull(ExchangeEngineDataDoneEvent $event)
	{
		$this->dispatcher->dispatch(new ExchangeEngineTransformDataEvent($event->getExchange(), $event->getExchangeEngine()), ExchangeEngineTransformDataEvent::NAME);
	}
}
