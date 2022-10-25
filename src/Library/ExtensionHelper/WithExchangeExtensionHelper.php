<?php

namespace iikoExchangeBundle\ExtensionHelper;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;

class WithExchangeExtensionHelper
{
	public static function isNeedExchange(ExchangeNodeInterface $exchangeNode): bool
	{
		if ($exchangeNode instanceof WithExchangeExtensionInterface)
		{
			return true;
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			if (static::isNeedExchange($childNode))
			{
				return true;
			}
		}
		return false;
	}
}