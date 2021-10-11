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
		if($event->getData() !== false && $event->getData() !== null)
		{
			$event->getExchange()->getLoader()->sendRequest($event->getData());
		}

		$this->dispatcher->dispatch(ExchangeEngineDoneEvent::NAME, new ExchangeEngineDoneEvent($event->getExchange(), $event->getExchangeEngine()));
	}

}