<?php

namespace iikoExchangeBundle\Contract\Extensions;

use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;

interface ExchangeParametersInterface extends \JsonSerializable
{
	public function getPeriod(): ?Period;

	public function getRestaurant(): ?Restaurant;

	public function getRestaurantCollection(): ?array;
}