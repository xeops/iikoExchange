<?php

namespace iikoExchangeBundle\Contract\Engine;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\iikoStorage\GrabberInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Format\Formatter;
use iikoExchangeBundle\Library\Transform\AbstractTransformer;

interface ExchangeGrabEngineInterface extends ExchangeNodeInterface
{
	public function getGrabber(): GrabberInterface;

	public function getLoader() : StorageInterface;

	public function getTransformer(): AbstractTransformer;

	public function getFormatter(): Formatter;

	public function getChildNodes(): array;
}