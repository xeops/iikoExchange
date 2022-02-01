<?php

namespace iikoExchangeBundle\Exception;

use Exception;
use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Extensions\ExchangeParametersInterface;

class ExchangeParameters implements ExchangeParametersInterface
{
	protected ?Period $period = null;
	protected ?Restaurant $restaurant = null;
	protected ?array $restaurantCollection = [];

	public function getPeriod(): ?Period
	{
		return $this->period;
	}

	public function getRestaurant(): ?Restaurant
	{
		return $this->restaurant;
	}

	/**
	 * @param Period|null $period
	 * @return ExchangeParameters
	 */
	public function setPeriod(?Period $period): ExchangeParameters
	{
		$this->period = $period;
		return $this;
	}

	/**
	 * @param Restaurant|null $restaurant
	 * @return ExchangeParameters
	 */
	public function setRestaurant(?Restaurant $restaurant): ExchangeParameters
	{
		$this->restaurant = $restaurant;
		return $this;
	}

	public function jsonSerialize()
	{
		return [
			'to' => $this->period ? $this->period->getDateTo()->format('Y-m-d H:i:s') : null,
			'from' => $this->period ? $this->period->getDateFrom()->format('Y-m-d H:i:s') : null,
			'restaurantId' => $this->restaurant ? $this->restaurant->getId() : null,
			'restaurantName' => $this->restaurant ? $this->restaurant->getName() : null
		];
	}

	public function getRestaurantCollection(): ?array
	{
		return $this->restaurantCollection;
	}

	/**
	 * @param array|null $restaurantCollection
	 */
	public function setRestaurantCollection(?array $restaurantCollection): void
	{
		$this->restaurantCollection = $restaurantCollection;
	}
}