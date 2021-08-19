<?php

namespace App\Tests\Engine;

use iikoExchangeBundle\Engine\Event\ExchangeEngineRunEvent;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use iikoExchangeBundle\Exchange\Exchange;
use PHPUnit\Framework\TestCase;
use SymfonyContractsventDispatchervent;Dispatcher;

class ExchangeEngineTest extends TestCase
{

	public function testProcess()
	{
		$exchange = $this->createMock(Exchange::class);

		$mock = $this->createMock(EventDispatcher::class);
		$mock
			->expects($this->once())
			->method('dispatch')
			->withConsecutive([$this->equalTo(ExchangeEngineRunEvent::NAME), $this->isInstanceOf(ExchangeEngineRunEvent::class)]);

		$engine = new ExchangeEngine('__code__', $mock);

		$engine->run($exchange);
	}
}
