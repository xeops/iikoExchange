<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Exchange\Event\ExchangeErrorEvent;
use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Exchange extends AbstractExchangeBuilder
{
	public function __construct(string $code)
	{
		parent::__construct($code);
	}
}