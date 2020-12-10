<?php


namespace iikoExchangeBundle\Engine;


use iikoExchangeBundle\Engine\Event\ExchangeEngineProcessEvent;
use iikoExchangeBundle\Exchange\Exchange;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


class ExchangeEngine extends AbstractEngineBuilder
{
	/**
	 * @var EventDispatcherInterface
	 */
	private EventDispatcherInterface $dispatcher;

	public function __construct(string $code, EventDispatcherInterface $dispatcher)
	{
		parent::__construct($code);

		$this->dispatcher = $dispatcher;
	}

	public function process(Exchange $exchange)
	{
		$this->dispatcher->dispatch(ExchangeEngineProcessEvent::NAME, new ExchangeEngineProcessEvent($exchange, $this));
	}
}