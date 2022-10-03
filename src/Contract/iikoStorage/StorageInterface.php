<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface StorageInterface extends ExchangeNodeInterface
{
	public function store($externalId, $data);

	public function getCode(): string;
}