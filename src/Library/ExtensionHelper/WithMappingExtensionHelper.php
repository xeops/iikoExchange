<?php


namespace iikoExchangeBundle\ExtensionHelper;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Mapping\MappingInterface;

/**
 * Class WithMappingExtensionHelper
 * @package iikoExchangeBundle\ExtensionHelper
 */
class WithMappingExtensionHelper
{
	public static function searchMappingInExchange(string $searchCode, ExchangeNodeInterface $exchangeNode): ?MappingInterface
	{
		if ($exchangeNode instanceof WithMappingExtensionInterface)
		{
			foreach ($exchangeNode->getMapping() as $mapping)
			{
				if ($mapping->getCode() === $searchCode)
				{
					return $mapping;
				}
			}
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			$mapping = self::searchMappingInExchange($searchCode, $childNode);
			if ($mapping)
			{
				return $mapping;
			}
		}
		return null;
	}

	/**
	 * @param ExchangeNodeInterface $exchangeNode
	 * @return MappingInterface[]
	 */
	public static function extractMapping(ExchangeNodeInterface $exchangeNode)
	{
		$mappingList = [];

		if($exchangeNode instanceof WithMappingExtensionInterface)
		{
			foreach ($exchangeNode->getMapping() as $mapping)
			{
				$mappingList[$mapping->getCode()] = $mapping;
			}

		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			$mappingList = array_merge($mappingList, self::extractMapping($childNode));
		}

		return $mappingList;
	}

}