<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface StorageInterface extends ExchangeNodeInterface
{
	public function store($storageEntity);

	public function getCode(): string;
}