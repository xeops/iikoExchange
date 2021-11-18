<?php

namespace iikoExchangeBundle\Contract\Extensions;

use iikoExchangeBundle\Application\Period;
use iikoExchangeBundle\Application\Restaurant;

interface ExchangeParametersInterface
{
	public function getPeriod(): ?Period;

	public function getRestaurant(): ?Restaurant;
}