<?php


namespace iikoExchangeBundle\Format\EventTrigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineFormatEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineLoadEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeFormatStageEventTrigger
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(EventDispatcherInterface $dispatcher)
	{

		$this->dispatcher = $dispatcher;
	}

	public function onFormat(ExchangeEngineFormatEvent $event)
	{
		$data = $event->getFormatter()->getFormattedData($event->getExchange(), $event->getData());
		$this->dispatcher->dispatch(ExchangeEngineLoadEvent::NAME, new ExchangeEngineLoadEvent($event->getExchange(), $event->getEngine(), $data));
	}
}