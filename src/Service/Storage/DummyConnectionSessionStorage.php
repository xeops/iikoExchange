<?php

namespace iikoExchangeBundle\Service\Storage;

use iikoExchangeBundle\Contract\Service\ConnectionSessionStorage;

class DummyConnectionSessionStorage implements ConnectionSessionStorage
{
	private $storage = [];

	public function set(string $key, string $value)
	{
		$this->storage[$key] = $value;
	}

	public function get(string $key): ?string
	{
		return $this->storage[$key] ?? null;
	}

	public function has(string $key): bool
	{
		return array_key_exists($key, $this->storage);
	}
}