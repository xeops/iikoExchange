<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;

/**
 * Trait WithRestaurantExtensionTrait
 * @package iikoExchangeBundle\ExtensionTrait
 * @depends  WithRestaurantExtensionInterface
 */
trait WithRestaurantExtensionTrait
{
	protected Restaurant $restaurant;

	protected bool $useRestaurant = true;

	public function setRestaurant($restaurant)
	{
		$this->restaurant = $restaurant;
		return $this;
	}

	public function getRestaurant() : Restaurant
	{
		return $this->restaurant;
	}

	public function jsonSerialize()
	{
		return [
			self::FIELD_USE_RESTAURANT => $this->useRestaurant
		];
	}
}