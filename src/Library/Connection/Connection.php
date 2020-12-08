<?php


namespace iikoExchangeBundle\Connection;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

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