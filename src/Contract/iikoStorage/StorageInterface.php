<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

interface StorageInterface
{
	public function store($id, $data);

	public function getCode(): string;
}