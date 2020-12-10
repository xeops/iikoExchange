<?php


namespace iikoExchangeBundle\Exchange\Trigger;


use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use Psr\Log\LoggerInterface;

class ExchangeProcessEventTrigger
{
	/**
	 * @var LoggerInterface
	 */
	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	public function onProcess(ExchangeProcessEvent $event)
	{
		$this->logger->debug("Exchange process event", ['exchange' => $event->getExchange()->getCode()]);
		foreach ($event->getExchange()->getEngines() as $engine)
		{
			$this->logger->debug('Exchange start engine', ['exchange' => $event->getExchange()->getCode(), 'engine' => $engine->getCode()]);
			$engine->process($event->getExchange());
		}

	}
}