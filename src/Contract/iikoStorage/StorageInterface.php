<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

interface StorageInterface
{
	public function store($externalId, $data);

	public function getCode(): string;
}