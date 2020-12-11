<?php


namespace iikoExchangeBundle\Contract\Extensions;


interface WithRestaurantExtensionInterface
{
	const FIELD_USE_RESTAURANT = 'use_restaurant';

	public function setRestaurant($restaurant);

	public function getRestaurant();
}