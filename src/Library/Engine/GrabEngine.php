<?php

namespace iikoExchangeBundle\Engine;

use iikoExchangeBundle\Contract\Engine\ExchangeGrabEngineInterface;
use iikoExchangeBundle\Contract\iikoStorage\GrabberInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Format\Formatter;
use iikoExchangeBundle\Library\Transform\AbstractTransformer;

class GrabEngine implements ExchangeGrabEngineInterface
{
	use ExchangeNodeTrait;

	private GrabberInterface $grabber;
	private AbstractTransformer $transformer;
	private Formatter $formatter;
	private StorageInterface $storage;

	public function __construct(GrabberInterface $grabber, AbstractTransformer $transformer, Formatter $formatter, StorageInterface $storage)
	{
		$this->grabber = $grabber;
		$this->transformer = $transformer;
		$this->formatter = $formatter;
		$this->storage = $storage;
	}

	public function getGrabber(): GrabberInterface
	{
		return $this->grabber;
	}

	public function getLoader(): StorageInterface
	{
		return $this->storage;
	}

	public function getTransformer(): AbstractTransformer
	{
		return $this->transformer;
	}

	public function getFormatter(): Formatter
	{
		return $this->formatter;
	}
}