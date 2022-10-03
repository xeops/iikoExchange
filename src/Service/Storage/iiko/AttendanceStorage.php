<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\WithRestaurantExtensionTrait;

abstract class AttendanceStorage implements StorageInterface, WithExchangeExtensionInterface, WithRestaurantExtensionInterface
{
	use WithExchangeExtensionTrait;

	use WithRestaurantExtensionTrait
	{
		WithRestaurantExtensionTrait::jsonSerialize as restaurantJsonSerialize;
	}
	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as nodeJsonSerialize;
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->restaurantJsonSerialize();
	}

}