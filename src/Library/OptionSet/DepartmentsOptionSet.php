<?php

namespace iikoExchangeBundle\Library\OptionSet;

class DepartmentsOptionSet extends BaseOptionSet
{

	public static function getCode(): string
	{
		return 'DEPARTMENT';
	}

	public function getItems(): array
	{
		return [
			new OptionSetItem('My restaurant', 1)
		];
	}

	public function getRequest()
	{
		throw new \Exception('Not implemented');
	}

	public function processResponse($response): array
	{
		throw new \Exception('Not implemented');
	}
}