<?php


namespace iikoExchangeBundle\Library\Request\EventTrigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineDataDoneEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineSendRequestEvent;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Request\DataSourceRequest;
use iikoExchangeBundle\Service\ExchangeEngineDataManager;
use SymfonyContractsventDispatchervent;DispatcherInterface;

class ExchangeEngineSendRequestEventTrigger
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

	public function onSendRequest(ExchangeEngineSendRequestEvent $event)
	{
		$data = $event->getDataSourceRequest()->processResponse($event->getExchange()->getExtractor()->sendRequest($event->getDataSourceRequest()->getRequest()));

		$this->saveData($event->getExchange(), $event->getDataSourceRequest(), $data);

		$this->tryNextStageEngine($event->getExchange(), $event->getDataSourceRequest());
	}

	protected function tryNextStageEngine(Exchange $exchange, DataSourceRequest $dataSourceRequest)
	{
		foreach ($exchange->getEngines() as $engine)
		{
			if (!in_array($dataSourceRequest->getCode(), array_map(fn(DataSourceRequest $request) => $request->getCode(), $engine->getRequests())))
			{
				continue;
			}
			if ($this->dataManager->isCacheFull($exchange, $engine))
			{
				$this->dispatchEngineLoadAllData($exchange, $engine);
			}
		}
	}

	protected function dispatchEngineLoadAllData(Exchange $exchange, ExchangeEngine $exchangeEngine)
	{
		$this->dispatcher->dispatch(new ExchangeEngineDataDoneEvent($exchange, $exchangeEngine), ExchangeEngineDataDoneEvent::NAME);
	}

	protected function saveData(Exchange $exchange, DataSourceRequest $request, $data)
	{
		$this->dataManager->setData($exchange, $request, $data);
	}
}
