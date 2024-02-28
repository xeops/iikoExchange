<?php

namespace iikoExchangeBundle\Contract\Engine;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\iikoStorage\GrabberInterface;

interface ExchangeGrabEngineInterface extends ExchangeNodeInterface
{
	public function getGrabber(): GrabberInterface;

	public function setGrabber(GrabberInterface $grabber);
}