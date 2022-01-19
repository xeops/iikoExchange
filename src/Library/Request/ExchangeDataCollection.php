<?php

namespace iikoExchangeBundle\Library\Request;

use Doctrine\Common\Collections\ArrayCollection;
use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithMultiRestaurantExtensionInterface;

class ExchangeDataCollection
{
	/** @var ArrayCollection<RequestResponseItem> */
	protected $collection;

	public function __construct()
	{
		$this->collection = new ArrayCollection();
	}

	public function add($data, string $requestCode, ?Restaurant $restaurant = null): ExchangeDataCollection
	{
		$this->collection->add(['requestCode' => $requestCode, 'restaurant' => $restaurant, 'data' => $data]);
		return $this;
	}

	public function exist(string $requestCode, ?Restaurant $restaurant = null): bool
	{
		return $this->collection->filter(fn($item) => $item['requestCode'] === $requestCode && $item['restaurant'] === $restaurant)->count() > 0;
	}

	/**
	 * Возвращает данные, посчитанные движком по всем запросам
	 * @param string $requestCode - код запроса
	 * @param bool $forMultiStore Если $forMultiStore = true с множеством ресторанов, то данные передадутся в формате массива [restaurantId => data], иначе просто data
	 * @return mixed
	 */
	public function get(string $requestCode, bool $forMultiStore = false)
	{
		if ($forMultiStore)
		{
			$result = [];

			$this->collection->filter(fn($item) => $item['requestCode'] === $requestCode && $item['restaurant'] !== null)->forAll(fn($item) => $result[$item['restaurant']] = $item['data']);

			return $result;
		}
		return $this->collection->filter(fn($item) => $item['requestCode'] === $requestCode && $item['restaurant'] === null)->first()['data'];
	}
}