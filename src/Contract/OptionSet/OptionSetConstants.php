<?php

namespace iikoExchangeBundle\Contract\OptionSet;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface OptionSetConstants
{
	public static function getCode(): string;
	/**
	 * @return OptionSetItemInterface[]
	 */
	public function getCollection(ExchangeInterface $exchange, ?Restaurant $restaurant = null) : array;
}