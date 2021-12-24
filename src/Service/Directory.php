<?php

namespace iikoExchangeBundle\Service;

class Directory
{
	private array $collection = [];

	public function add($entity): Directory
	{
		$this->collection[$entity->getCode()] = $entity;
		return $this;
	}

	public function getAll(): array
	{
		return $this->collection;
	}

	public function get(string $code)
	{
		if (!$this->exist($code))
		{
			throw new \Exception("Element {$code} doesnt exist in collection");
		}
		return $this->collection[$code];
	}

	public function exist(string $code): bool
	{
		return array_key_exists($code, $this->collection);
	}
}