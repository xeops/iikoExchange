<?php


namespace iikoExchangeBundle\Exchange\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineDoneEvent;
use iikoExchangeBundle\Exchange\Event\ExchangeDoneEvent;
use iikoExchangeBundle\Service\ExchangeProcessManagerService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeEngineDoneEventTrigger
{
	/**
	 * @var ExchangeProcessManagerService
	 */
	private ExchangeProcessManagerService $processManager;
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $eventDispatcher;

	public function __construct(ExchangeProcessManagerService $processManager, EventDispatcherInterface $eventDispatcher)
	{
		$this->processManager = $processManager;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function onEngineDone(ExchangeEngineDoneEvent $event)
	{
		if ($this->processManager->isAllEngineDone($event->getExchange()))
		{
			$this->eventDispatcher->dispatch(ExchangeDoneEvent::NAME, new ExchangeDoneEvent($event->getExchange()));
		}
	}
}