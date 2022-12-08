<?php

namespace iikoExchangeBundle\Service\Storage\iiko;

use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithExchangeExtensionTrait;

abstract class AttendanceStorage implements StorageInterface, WithExchangeExtensionInterface
{
	use WithExchangeExtensionTrait;

	use ExchangeNodeTrait;

	public function getCode(): string
	{
		return IIKO;
	}
}