<?php

namespace iikoExchangeBundle\Exception;

use Exception;
use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Extensions\ExchangeParametersInterface;

class ExchangeParameters implements ExchangeParametersInterface
{
	protected ?Period $period;
	protected ?Restaurant $restaurant;


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


}