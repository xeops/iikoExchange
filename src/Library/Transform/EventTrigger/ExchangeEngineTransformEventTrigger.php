<?php


namespace iikoExchangeBundle\Library\Transform\EventTrigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineLoadEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineTransformDataEvent;
use iikoExchangeBundle\Service\ExchangeEngineDataManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeEngineTransformEventTrigger
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;
	/**
	 * @var ExchangeEngineDataManager
	 */
	private ExchangeEngineDataManager $dataManager;

	public function __construct(EventDispatcherInterface $dispatcher, ExchangeEngineDataManager $dataManager)
	{
		$this->dispatcher = $dispatcher;
		$this->dataManager = $dataManager;
	}

	public function onTransform(ExchangeEngineTransformDataEvent $event)
	{
		$data = $event->getExchangeEngine()->getTransformer()->transform($event->getExchange(), $event->getExchangeEngine(), $this->dataManager->getCachedDataForEngine($event->getExchange(), $event->getExchangeEngine()));
		$this->dispatcher->dispatch(ExchangeEngineLoadEvent::NAME, new ExchangeEngineLoadEvent($event->getExchange(), $event->getExchangeEngine(), $data));
	}
}