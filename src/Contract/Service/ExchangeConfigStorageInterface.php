<?php

namespace iikoExchangeBundle\Contract\Service;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Configuration\ConfigType\ConfigItemInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface ExchangeConfigStorageInterface
{
	/**
	 * @param ExchangeInterface $exchange
	 * @param ExchangeNodeInterface $exchangeNode
	 * @param Restaurant|null $restaurant
	 * @return ConfigItemInterface[]
	 */
	public function getConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, ?Restaurant $restaurant = null): array;
}