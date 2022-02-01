<?php

namespace iikoExchangeBundle\Contract\Service;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface ExchangeConfigStorageInterface
{
	/**
	 * @param ExchangeInterface $exchange
	 * @param ExchangeNodeInterface $exchangeNode
	 * @param Restaurant|null $restaurant
	 * @return int[]|string[]|bool[]|float[]
	 */
	public function getConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, ?Restaurant $restaurant = null): array;

	public function saveConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, array $configuration, ?Restaurant $restaurant = null);

	public function appendConfiguration(ExchangeInterface $exchange, ExchangeNodeInterface $exchangeNode, string $code, $value, ?Restaurant $restaurant = null);
}