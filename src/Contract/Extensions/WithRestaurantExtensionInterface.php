<?php


namespace iikoExchangeBundle\Contract\Extensions;


interface WithRestaurantExtensionInterface
{
	const FIELD_RESTAURANT = 'restaurant';

	const FIELD_USE_RESTAURANT = 'by_store';

	public function setRestaurant($restaurant);

	public function getRestaurant();
}