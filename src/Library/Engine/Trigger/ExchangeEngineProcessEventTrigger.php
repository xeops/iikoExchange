<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineProcessEvent;
use iikoExchangeBundle\Service\ExchangeEngineDataManager;

class ExchangeEngineProcessEventTrigger
{
	/**
	 * @var ExchangeEngineDataManager
	 */
	private ExchangeEngineDataManager $dataManager;

	public function __construct(ExchangeEngineDataManager $dataManager)
	{
		$this->dataManager = $dataManager;
	}

	public function onEngineProcess(ExchangeEngineProcessEvent $event)
	{
		$data = $this->dataManager->getCachedDataForEngine($event->getExchange(), $event->getExchangeEngine());




	}
}