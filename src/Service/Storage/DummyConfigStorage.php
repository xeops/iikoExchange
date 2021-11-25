<?php

namespace iikoExchangeBundle\Service\Storage;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Service\ExchangeConfigStorageInterface;

class DummyConfigStorage implements ExchangeConfigStorageInterface
{

	public function getConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, ?Restaurant $restaurant = null): array
	{
		// TODO: Implement getConfiguration() method.
	}

	public function saveConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, array $configuration, ?Restaurant $restaurant = null)
	{
		// TODO: Implement saveConfiguration() method.
	}

	public function appendConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, string $code, $value, ?Restaurant $restaurant = null)
	{
		// TODO: Implement appendConfiguration() method.
	}
}