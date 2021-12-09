<?php

namespace iikoExchangeBundle\Library\Request;

use Doctrine\Common\Collections\ArrayCollection;

class RequestResponseCollection
{
	/** @var ArrayCollection<RequestResponseItem> */
	protected ArrayCollection $collection;

	public function __construct()
	{
		$this->collection = new ArrayCollection();
	}

	public function add(RequestResponseItem $item)
	{
		$this->collection->add($item);
	}

	/**
	 * @param string $requestCode
	 * @return RequestResponseItem[]
	 */
	public function getByRequestCode(string $requestCode): ArrayCollection
	{
		return $this->collection->filter(fn(RequestResponseItem $item) => $item->getRequestCode() === $requestCode);
	}

	public function exist(string $requestCode, int $restaurantId)
	{
		return $this->collection->exists(fn($key, RequestResponseItem $item) => $item->getRequestCode() === $requestCode && $item->getRestaurant()->getId() === $restaurantId);
	}

	/**
	 * @return ArrayCollection
	 */
	public function getCollection(): ArrayCollection
	{
		return $this->collection;
	}

	public function withFilter(\Closure $closure) : RequestResponseCollection
	{
		$result = (clone $this);
		$result->collection = $result->collection->filter($closure);

		return $result;
	}
}