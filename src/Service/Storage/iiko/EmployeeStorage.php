<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Connection\iiko\iikoConnection;
use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\iiko\Staff\EmployeeDto;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;
use Psr\Log\LoggerInterface;

class EmployeeStorage implements StorageInterface, WithExchangeExtensionInterface
{
	use WithExchangeExtensionTrait;

	private LoggerInterface $logger;
	private iikoConnection $connection;

	public function __construct(LoggerInterface $logger, iikoConnection $connection)
	{
		$this->logger = $logger;
		$this->connection = $connection;
	}

	/**
	 * @param EmployeeDto[] $data
	 * @return mixed
	 * @throws \Exception
	 */
	public function store($data)
	{
		throw new \Exception('Not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}