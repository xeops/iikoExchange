<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineLoadEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineTransformDataEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeEngineTransformEventTrigger
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(EventDispatcherInterface $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}

	public function onTransform(ExchangeEngineTransformDataEvent $event)
	{
		$data = $event->getExchangeEngine()->getTransformer()->transform($event->getExchange(), $event->getExchangeEngine(), $event->getData());
		$this->dispatcher->dispatch(ExchangeEngineLoadEvent::NAME, new ExchangeEngineLoadEvent($event->getExchange(), $event->getExchangeEngine(), $data));
	}
}