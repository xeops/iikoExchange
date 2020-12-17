<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Exchange\Event\ExchangeErrorEvent;
use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
		$this->eventDispatcher->dispatch(ExchangeProcessEvent::NAME, new ExchangeProcessEvent($this));
	}

	public function error(\Exception $exception)
	{
		$this->eventDispatcher->dispatch(ExchangeErrorEvent::NAME, new ExchangeErrorEvent($this, $exception));
	}
}