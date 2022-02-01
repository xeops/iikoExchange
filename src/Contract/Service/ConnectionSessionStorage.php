<?php

namespace iikoExchangeBundle\Contract\Service;

interface ConnectionSessionStorage
{
	public function set(string $key, string $value);

	public function get(string $key): ?string;

	public function has(string $key) : bool;
}