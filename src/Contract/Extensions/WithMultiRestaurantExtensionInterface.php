<?php

namespace iikoExchangeBundle\Contract\Extensions;

use iikoExchangeBundle\Application\Restaurant;

interface WithMultiRestaurantExtensionInterface
{
	const FIELD_BY_MULTI_STORE = 'by_multi_restaurant';

	public function setRestaurantCollection(array $collection);

	/**
	 * @return Restaurant[]
	 */
	public function getRestaurantCollection(): array;
}