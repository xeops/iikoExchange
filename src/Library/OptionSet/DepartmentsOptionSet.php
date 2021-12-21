<?php

namespace iikoExchangeBundle\Library\OptionSet;

use iikoExchangeBundle\Contract\OptionSet\OptionSetInterface;

class DepartmentsOptionSet implements OptionSetInterface
{

	public static function getCode(): string
	{
		return 'DEPARTMENTS';
	}

	public function getItems(): array
	{
		return [
			new OptionSetItem('My restaurant', 1)
		];
	}
}