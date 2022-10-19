<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Connection\iiko\iikoConnection;
use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\iiko\Staff\IikoEmployeeScheduleDto;
use iikoExchangeBundle\Contract\iikoStorage\StorageEntityInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\WithRestaurantExtensionTrait;
use Psr\Log\LoggerInterface;

class ScheduleStorage implements StorageInterface, WithExchangeExtensionInterface, WithRestaurantExtensionInterface
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

	/**
	 * @param $externalId
	 * @param IikoEmployeeScheduleDto[] $data
	 * @return mixed
	 * @throws ExchangeException
	 */
	public function store(StorageEntityInterface $storageEntity)
	{
		throw new ExchangeException('ScheduleStorage not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}