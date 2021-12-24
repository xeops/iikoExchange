<?php


namespace iikoExchangeBundle\Contract\Extensions;


use iikoExchangeBundle\Application\Restaurant;

interface WithRestaurantExtensionInterface
{
	const FIELD_RESTAURANT = 'restaurant';

	const FIELD_USE_RESTAURANT = 'by_store';

	public function setRestaurant($restaurant);

	public function getRestaurant(): ?Restaurant;
}