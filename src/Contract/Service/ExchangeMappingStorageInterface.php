<?php

namespace iikoExchangeBundle\Contract\Service;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface ExchangeMappingStorageInterface
{
	public function getMapping(ExchangeInterface $exchange, string $mappingCode, ?Restaurant $restaurant = null);
}