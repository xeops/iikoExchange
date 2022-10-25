<?php

namespace iikoExchangeBundle\Library\OptionSet;

use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\OptionSet\OptionSetInterface;

class PaymentTypesOptionSet implements OptionSetInterface
{

	public static function getCode(): string
	{
		return 'PaymentType';
	}

	public function getItems(): array
	{
		return [];
	}

}