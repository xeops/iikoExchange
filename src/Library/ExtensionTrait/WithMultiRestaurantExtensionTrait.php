<?php

namespace iikoExchangeBundle\ExtensionTrait;

use iikoExchangeBundle\Contract\Extensions\WithMultiRestaurantExtensionInterface;

trait WithMultiRestaurantExtensionTrait
{
	protected array $collection;

	public function setRestaurantCollection(array $collection)
	{
		$this->collection = $collection;
	}

	public function getRestaurantCollection(): array
	{
		return $this->collection;
	}
}