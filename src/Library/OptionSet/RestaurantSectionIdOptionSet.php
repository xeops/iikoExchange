<?php

namespace iikoExchangeBundle\Library\OptionSet;

use iikoExchangeBundle\Library\Request\iiko\RestaurantSectionRequest;

class RestaurantSectionIdOptionSet extends BaseOptionSet
{

	public static function getCode(): string
	{
		return 'RESTAURANT_SECTION_ID';
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
			$result[$item['id']] = new OptionSetItem($item['name'], $item['id']);
		}
		return array_values($result);
	}
}