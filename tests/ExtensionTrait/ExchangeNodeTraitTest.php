<?php

namespace App\Tests\ExtensionTrait;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use PHPUnit\Framework\TestCase;

class ExchangeNodeTraitTest extends TestCase
{
	/** @var TestNode */
	protected TestNode $instance;

	protected function setUp(): void
	{
		parent::setUp();
		$this->instance = new TestNode('__CODE__');
	}

	public function testJsonSerialize()
	{
		$this->assertEquals([
			TestNode::FIELD_CODE => $this->instance->getCode(),
			TestNode::FIELD_NAME => $this->instance->getName(),
			TestNode::FIELD_DESCRIPTION => $this->instance->getDescription(),
		], json_decode(json_encode($this->instance), true));
	}

	public function testGetChildNodes()
	{
		$this->assertEquals([new TestChildNode], $this->instance->getChildNodes(), 'check if child nodes return array');
	}

	public function testGetName()
	{
		$this->assertEquals('__CODE__', $this->instance->getDescription());
		$this->instance->setDescription('NAME');
		$this->assertEquals('NAME', $this->instance->getDescription());

	}

	public function testGetCode()
	{
		$this->assertEquals('__CODE__', $this->instance->getCode());
	}

	public function testSetDescription()
	{
		$this->assertEquals('__CODE__', $this->instance->getDescription());
		$this->instance->setDescription('DESC');
		$this->assertEquals('DESC', $this->instance->getDescription());
	}

	public function testGetDescription()
	{
		$this->assertEquals('__CODE__', $this->instance->getDescription());
		$this->instance->setDescription('DESC');
		$this->assertEquals('DESC', $this->instance->getDescription());
	}

	public function testSetName()
	{
		$this->assertEquals('__CODE__', $this->instance->getDescription());
		$this->instance->setDescription('NAME');
		$this->assertEquals('NAME', $this->instance->getDescription());
	}
}

class TestNode implements ExchangeNodeInterface
{
	use ExchangeNodeTrait;

	public function __construct(string $code)
	{
		$this->code = $code;
	}


	public function getChildNodes(): array
	{
		return [
			new TestChildNode
		];
	}
}

class TestChildNode implements ExchangeNodeInterface
{
	use ExchangeNodeTrait;
}