<?php

namespace iikoExchangeBundle\ExtensionHelper;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithRevisionExtensionInterface;

class WithRevisionExtensionHelper
{
	public static function isNeedRevision(ExchangeNodeInterface $exchangeNode): bool
	{
		if ($exchangeNode instanceof WithRevisionExtensionInterface)
		{
			return true;
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			if (static::isNeedRevision($childNode))
			{
				return true;
			}
		}
		return false;
	}

	public static function setRevisionForExchangeNode(ExchangeNodeInterface $exchangeNode, int $revision): void
	{
		if ($exchangeNode instanceof WithRevisionExtensionInterface)
		{
			$exchangeNode->setRevision($revision);
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			static::setRevisionForExchangeNode($childNode, $revision);
		}
	}
}