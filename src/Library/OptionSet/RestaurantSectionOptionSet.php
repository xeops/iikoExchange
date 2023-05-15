<?php

namespace iikoExchangeBundle\Library\OptionSet;

use iikoExchangeBundle\Library\Request\iiko\RestaurantSectionRequest;

class RestaurantSectionOptionSet extends BaseOptionSet
{

	public static function getCode(): string
	{
		return 'RESTAURANT_SECTION';
	}

	public function getRequest()
	{
		return new RestaurantSectionRequest();
	}

	public function processResponse($response): array
	{
		$result = [];
		foreach (json_decode(json_encode(simplexml_load_string($response)), true)['document'] ?? [] as $item)
		{
			if (!is_string($item['name']))
			{
				continue;
			}
			$result[$item['name']] = new OptionSetItem($item['name'], $item['name']);
		}
		return array_unique($result);
	}
}