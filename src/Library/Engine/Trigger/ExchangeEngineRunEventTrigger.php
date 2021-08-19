<?php


namespace iikoExchangeBundle\Engine\Trigger;


use iikoExchangeBundle\Engine\Event\ExchangeEngineRunEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineSendRequestEvent;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ExchangeEngineRunEventTrigger
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(EventDispatcherInterface $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}

	public function onExchangeEngineRun(ExchangeEngineRunEvent $event)
	{
		$requests = [];

		foreach ($event->getEngine()->getRequests() as $dataSourceRequest)
		{
			$requests[$dataSourceRequest->getCode()] = $dataSourceRequest;
		}
		$this->processRequestCollection($event->getExchange(), $requests);
	}

	protected function processRequestCollection(Exchange $exchange, array $requests) : void
	{
		foreach ($requests as $dataSourceRequest)
		{
			$this->dispatcher->dispatch(new ExchangeEngineSendRequestEvent($exchange, $dataSourceRequest), ExchangeEngineSendRequestEvent::NAME);
		}
	}
}
