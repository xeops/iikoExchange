<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineDoneEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineLoadEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
		$request = $event->getExchangeEngine()->getFormatter()->getRequest($event->getExchange(), $event->getExchangeEngine(), $event->getData());

		$event->getExchange()->getLoader()->sendRequest($request);

		$this->dispatcher->dispatch(ExchangeEngineDoneEvent::NAME, new ExchangeEngineDoneEvent($event->getExchange(), $event->getExchangeEngine()));
	}

}