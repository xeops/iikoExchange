<?php


namespace iikoExchangeBundle\ExtensionHelper;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithPeriodExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;

class PeriodicalExtensionHelper
{
	public static function setPeriodForExchangeNode(ExchangeNodeInterface $exchangeNode, $period)
	{
		if ($exchangeNode instanceof WithPeriodExtensionInterface)
		{
			$exchangeNode->setPeriod($period);
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			static::setPeriodForExchangeNode($childNode, $period);
		}
	}

	public static function extractPeriod(ExchangeNodeInterface $exchangeNode)
	{
		if ($exchangeNode instanceof WithPeriodExtensionInterface)
		{
			return $exchangeNode->getPeriod();
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			$restaurant = static::extractPeriod($childNode);
			if ($restaurant)
			{
				return null;
			}
		}
		return null;
	}
}