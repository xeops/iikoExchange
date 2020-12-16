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
			$period = static::extractPeriod($childNode);
			if ($period)
			{
				return $period;
			}
		}
		return null;
	}

	public static function isNeedPeriod(ExchangeNodeInterface $exchangeNode)
	{
		if ($exchangeNode instanceof WithPeriodExtensionInterface)
		{
			return true;
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			if (static::isNeedPeriod($childNode))
			{
				return true;
			}
		}
		return false;
	}

	public static function isNeedBreakDownByDays(ExchangeNodeInterface $exchangeNode)
	{
		if ($exchangeNode instanceof WithPeriodExtensionInterface && $exchangeNode->byDays() === true)
		{
			return true;
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			if (static::isNeedPeriod($childNode))
			{
				return true;
			}
		}
		return false;
	}
}