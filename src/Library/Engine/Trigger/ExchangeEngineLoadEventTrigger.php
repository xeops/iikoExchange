<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineDoneEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineLoadEvent;
use SymfonyContractsventDispatchervent;DispatcherInterface;

class ExchangeEngineLoadEventTrigger
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(EventDispatcherInterface $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}

	public function onLoad(ExchangeEngineLoadEvent $event)
	{
		$event->getExchange()->getLoader()->sendRequest($event->getData());

		$this->dispatcher->dispatch(new ExchangeEngineDoneEvent($event->getExchange(), $event->getExchangeEngine()), ExchangeEngineDoneEvent::NAME);
	}

}
