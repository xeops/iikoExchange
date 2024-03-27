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

class ScheduleStorage implements StorageInterface, WithExchangeExtensionInterface
{
	use WithExchangeExtensionTrait;


	use ExchangeNodeTrait;


	/**
	 * @param $externalId
	 * @param IikoEmployeeScheduleDto[] $data
	 * @return mixed
	 * @throws ExchangeException
	 */
	public function store($storageEntity)
	{
		throw new ExchangeException('ScheduleStorage not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}