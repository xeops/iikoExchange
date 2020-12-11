<?php


namespace iikoExchangeBundle\ExtensionHelper;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithPeriodInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;

class PeriodicalExtensionHelper
{
	public static function setPeriodForExchangeNode(ExchangeNodeInterface $exchangeNode, $period)
	{
		if ($exchangeNode instanceof WithPeriodInterface)
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
		if ($exchangeNode instanceof WithPeriodInterface)
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