<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use iikoExchangeBundle\ExtensionTrait\UniqueExtensionTrait;
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

	public final function process()
	{
		$this->eventDispatcher->dispatch(ExchangeProcessEvent::NAME, new ExchangeProcessEvent($this));
	}
}