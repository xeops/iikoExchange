<?php

namespace App\Tests\Engine;

use iikoExchangeBundle\Engine\Event\ExchangeEngineProcessEvent;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use iikoExchangeBundle\Exchange\Exchange;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

class ExchangeEngineTest extends TestCase
{

	public function testProcess()
	{
		$exchange = $this->createMock(Exchange::class);

		$mock = $this->createMock(EventDispatcher::class);
		$mock
			->expects($this->once())
			->method('dispatch')
			->withConsecutive([$this->equalTo(ExchangeEngineProcessEvent::NAME), $this->isInstanceOf(ExchangeEngineProcessEvent::class)]);

		$engine = new ExchangeEngine('__code__', $mock);

		$engine->process($exchange);
	}
}
