<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageEntityInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;

class SalaryStorage implements StorageInterface, WithExchangeExtensionInterface
{
	use WithExchangeExtensionTrait;


	use ExchangeNodeTrait;

	const STORAGE_SALARY = 'Salary';

	public function store($storageEntity)
	{
		throw new \Exception('Not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}