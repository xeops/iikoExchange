<?php

namespace iikoExchangeBundle\ExtensionHelper;

use iikoExchangeBundle\Contract\Configuration\ConfigType\ConfigItemInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;

class WithConfigExtensionHelper
{
	/**
	 * @param ExchangeNodeInterface $exchangeNode
	 * @return ConfigItemInterface[]
	 */
	public static function extractConfig(ExchangeNodeInterface $exchangeNode): array
	{
		$list = [];

		if ($exchangeNode instanceof ConfigurableExtensionInterface)
		{
			foreach ($exchangeNode->exposeConfiguration() as $config)
			{
				$list[$config->getCode()] = $config;
			}

		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			$list = array_merge($list, self::extractConfig($childNode));
		}

		return $list;
	}
}