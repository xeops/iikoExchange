<?php


namespace iikoExchangeBundle\ExtensionHelper;


use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithMultiRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;

class WithRestaurantExtensionHelper
{
	public static function setRestaurantForExchangeNode(ExchangeNodeInterface $exchangeNode, Restaurant $restaurant)
	{
		if ($exchangeNode instanceof WithRestaurantExtensionInterface)
		{
			$exchangeNode->setRestaurant($restaurant);
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			static::setRestaurantForExchangeNode($childNode, $restaurant);
		}
	}

	public static function setRestaurantCollectionForExchangeNode(ExchangeNodeInterface $exchangeNode, array $collection)
	{
		if ($exchangeNode instanceof WithMultiRestaurantExtensionInterface)
		{
			$exchangeNode->setRestaurantCollection($collection);
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			static::setRestaurantCollectionForExchangeNode($childNode, $collection);
		}
	}

	public static function extractRestaurant(ExchangeNodeInterface $exchangeNode): ?Restaurant
	{
		if ($exchangeNode instanceof WithRestaurantExtensionInterface)
		{
			return $exchangeNode->getRestaurant();
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			$restaurant = static::extractRestaurant($childNode);
			if ($restaurant)
			{
				return $restaurant;
			}
		}
		return null;
	}

	public static function isNeedRestaurant(ExchangeNodeInterface $exchangeNode)
	{
		if ($exchangeNode instanceof WithRestaurantExtensionInterface)
		{
			return true;
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			if (static::isNeedRestaurant($childNode))
			{
				return true;
			}
		}
		return false;
	}

	public static function isNeedMultiRestaurant(ExchangeNodeInterface $exchangeNode)
	{
		if ($exchangeNode instanceof WithMultiRestaurantExtensionInterface)
		{
			return true;
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			if (static::isNeedMultiRestaurant($childNode))
			{
				return true;
			}
		}
		return false;
	}
}