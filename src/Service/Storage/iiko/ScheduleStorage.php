<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Connection\iiko\iikoConnection;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\iiko\Staff\IikoEmployeeScheduleDto;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Exception\ExchangeException;
use iikoExchangeBundle\ExtensionTrait\WithRestaurantExtensionTrait;
use Psr\Log\LoggerInterface;

class ScheduleStorage implements StorageInterface, WithRestaurantExtensionInterface
{
	protected LoggerInterface $logger;
	protected iikoConnection $connection;

	public function __construct(LoggerInterface $logger, iikoConnection $connection)
	{
		$this->logger = $logger;
		$this->connection = $connection;
	}

	use WithRestaurantExtensionTrait
	{
		WithRestaurantExtensionTrait::jsonSerialize as restaurantJsonSerialize;
	}

	/**
	 * @param $id
	 * @param IikoEmployeeScheduleDto[] $data
	 * @return mixed
	 * @throws ExchangeException
	 */
	public function store($data)
	{
		throw new ExchangeException('ScheduleStorage not implemented');
	}

	public function getCode(): string
	{
		return IIKO;
	}
}
