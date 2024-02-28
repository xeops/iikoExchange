<?php

namespace iikoExchangeBundle\Engine;

use iikoExchangeBundle\Contract\Engine\ExchangeGrabEngineInterface;
use iikoExchangeBundle\Contract\iikoStorage\GrabberInterface;

class GrabEngine extends ExchangeEngine implements ExchangeGrabEngineInterface
{
	private GrabberInterface $grabber;

	public function getChildNodes(): array
	{
		return [
			$this->getFormatter(),
			$this->getTransformer(),
			$this->getGrabber(),
			$this->getLoader()
		];
	}

	public function getGrabber(): GrabberInterface
	{
		return $this->grabber;
	}

	public function setGrabber(GrabberInterface $grabber)
	{
		$this->grabber = $grabber;
	}
}