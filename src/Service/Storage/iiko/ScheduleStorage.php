<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;

class ScheduleStorage implements StorageInterface, WithExchangeExtensionInterface
{
	use WithExchangeExtensionTrait;


	use ExchangeNodeTrait;


	public function store($storageEntity)
	{
		throw new ExchangeException('ScheduleStorage not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}