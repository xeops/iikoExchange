<?php

namespace iikoExchangeBundle\Contract\OptionSet;

use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Library\OptionSet\OptionSetItem;

interface OptionSetInterface
{
	public static function getCode(): string;

	public function getConnection(): ConnectionInterface;

	public function getRequest();

	/**
	 * @return OptionSetItem[]
	 */
	public function processResponse($response): array;
}