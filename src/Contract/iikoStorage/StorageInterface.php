<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface StorageInterface extends ExchangeNodeInterface
{
	public function store(StorageEntityInterface $storageEntity);

	public function getCode(): string;
}