<?php


namespace iikoExchangeBundle\Engine;


use iikoExchangeBundle\Engine\Event\ExchangeEngineProcessEvent;
use iikoExchangeBundle\Engine\Event\ExchangeEngineRunEvent;
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

	public final function run(Exchange $exchange)
	{
		$this->dispatcher->dispatch(ExchangeEngineRunEvent::NAME, new ExchangeEngineRunEvent($exchange, $this));
	}

}