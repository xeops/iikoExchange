<?php

namespace iikoExchangeBundle\Service\Storage;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\Service\ExchangeMappingStorageInterface;

class DummyMappingStorage implements ExchangeMappingStorageInterface
{

	public function getMapping(ExchangeInterface $exchange, string $mappingCode, ?Restaurant $restaurant = null)
	{
		// TODO: Implement getMapping() method.
	}
}