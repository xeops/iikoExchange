<?php


namespace iikoExchangeBundle\ExtensionHelper;



use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;

class WithRestaurantExtensionHelper
{
	public static function setRestaurantForExchangeNode(ExchangeNodeInterface $exchangeNode, $restaurant)
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

	public static function extractRestaurant(ExchangeNodeInterface $exchangeNode)
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
}