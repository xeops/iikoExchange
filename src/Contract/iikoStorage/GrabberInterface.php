<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface GrabberInterface extends ExchangeNodeInterface
{
	/**
	 * @return mixed
	 */
	public function grabData();
}