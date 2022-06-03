<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

interface StorageInterface
{
	public function store($data);

	public function getCode(): string;
}