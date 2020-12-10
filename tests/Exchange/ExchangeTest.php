<?php

namespace App\Tests\Exchange;

use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use iikoExchangeBundle\Exchange\Exchange;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

class ExchangeTest extends TestCase
{
	public function testConstructor()
	{
		$code = '__code__';
		$exchange = new Exchange($code, new EventDispatcher());
		$this->assertEquals($code, $exchange->getCode());
	}

	public function testProcess()
	{
		$mock = $this->createMock(EventDispatcher::class);
		$mock
			->expects($this->once())
			->method('dispatch')
			->withConsecutive([$this->equalTo(ExchangeProcessEvent::NAME), $this->isInstanceOf(ExchangeProcessEvent::class)]);

		$exchange = new Exchange('__code__', $mock);
		$exchange->process();
	}
}
