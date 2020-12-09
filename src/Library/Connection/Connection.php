<?php


namespace iikoExchange\Connection;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use iikoExchange\Contract\ExchangeNodeInterface;
use iikoExchange\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchange\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchange\ExtensionTrait\ExchangeNodeTrait;

class Connection implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	use ExchangeNodeTrait;
	use ConfigurableExtensionTrait;

	public function getClient(): ClientInterface
	{
		return new Client();
	}

	public function jsonSerialize()
	{
		return [
			self::FIELD_CODE => $this->getCode(),
			self::FIELD_CONFIGURATION => $this->exposeConfiguration()
		];
	}
}