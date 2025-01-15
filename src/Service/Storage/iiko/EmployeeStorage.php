<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageEntityInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;


class EmployeeStorage implements StorageInterface, WithExchangeExtensionInterface
{
	use WithExchangeExtensionTrait;

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as nodeJsonSerialize;
	}

	public function jsonSerialize()
	{

		return $this->nodeJsonSerialize();
	}

	/**
	 * @param StorageEntityInterface $storageEntity
	 * @return mixed
	 * @throws ExchangeException
	 */
	public function store($storageEntity)
	{
		throw new ExchangeException('Not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}