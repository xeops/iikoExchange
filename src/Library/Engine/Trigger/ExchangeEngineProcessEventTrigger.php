<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineProcessEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineTransformDataEvent;
use iikoExchangeBundle\Service\ExchangeEngineDataManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeEngineProcessEventTrigger
{
	/**
	 * @var ExchangeEngineDataManager
	 */
	private ExchangeEngineDataManager $dataManager;
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(ExchangeEngineDataManager $dataManager, EventDispatcherInterface $dispatcher)
	{
		$this->dataManager = $dataManager;
		$this->dispatcher = $dispatcher;
	}

	public function onEngineProcess(ExchangeEngineProcessEvent $event)
	{
		$data = $this->dataManager->getCachedDataForEngine($event->getExchange(), $event->getExchangeEngine());
		$this->dispatcher->dispatch(ExchangeEngineTransformDataEvent::NAME, new ExchangeEngineTransformDataEvent($event->getExchange(), $event->getExchangeEngine(), $data));
	}
}