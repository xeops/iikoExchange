<?php

namespace iikoExchangeBundle\ExtensionHelper;

use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
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

	public static function fillExchange(ExchangeNodeInterface $node, ExchangeInterface $exchange) : void
	{
		if($node instanceof WithExchangeExtensionInterface) {
			$node->setExchange($exchange);
		}
		foreach ($node->getChildNodes() as $childNode)
		{
			static::fillExchange($childNode, $exchange);
		}
	}
}