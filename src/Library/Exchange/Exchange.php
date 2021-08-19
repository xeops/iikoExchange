<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Exchange\Event\ExchangeErrorEvent;
use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use SymfonyContractsventDispatchervent;DispatcherInterface;

class Exchange extends AbstractExchangeBuilder
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $eventDispatcher;

	public function __construct(string $code, EventDispatcherInterface $eventDispatcher)
	{
		parent::__construct($code);
		$this->eventDispatcher = $eventDispatcher;
	}

	public function process()
	{
		$this->eventDispatcher->dispatch(new ExchangeProcessEvent($this), ExchangeProcessEvent::NAME);
	}

	public function error(\Exception $exception)
	{
		$this->eventDispatcher->dispatch(new ExchangeErrorEvent($this, $exception), ExchangeErrorEvent::NAME);
	}
}
