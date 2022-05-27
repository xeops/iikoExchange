<?php

namespace iikoExchangeBundle\Contract\Extensions;

use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface WithExchangeExtensionInterface
{

	public function setExchange(ExchangeInterface $exchange): WithExchangeExtensionInterface;

	public function getExchange(): ExchangeInterface;
}