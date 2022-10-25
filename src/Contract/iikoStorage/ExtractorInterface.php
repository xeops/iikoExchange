<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface ExtractorInterface extends ExchangeNodeInterface
{
	public function extract($data = null);
}