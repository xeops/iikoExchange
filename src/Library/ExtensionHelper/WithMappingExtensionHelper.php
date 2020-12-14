<?php


namespace iikoExchangeBundle\ExtensionHelper;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;

/**
 * Class WithMappingExtensionHelper
 * @package iikoExchangeBundle\ExtensionHelper
 * @deprecated not maintained
 */
class WithMappingExtensionHelper
{
	public static function setMappingForExchangeNode(ExchangeNodeInterface $exchangeNode, string $mappingCode, array $mappingCollection)
	{
		if ($exchangeNode instanceof WithMappingExtensionInterface)
		{
			if (array_key_exists($mappingCode, $exchangeNode->getMapping()))
			{
				$exchangeNode->setMappingValues($mappingCode, $mappingCollection);
			}
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			static::setMappingForExchangeNode($childNode, $mappingCode, $mappingCollection);
		}
	}

}