<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Connection\iiko\iikoConnection;
use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\iiko\Staff\EmployeeDto;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;
use Psr\Log\LoggerInterface;

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
	 * @param EmployeeDto[] $data
	 * @return mixed
	 * @throws \Exception
	 */
	public function store($id, $data)
	{
		throw new ExchangeException('Not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}