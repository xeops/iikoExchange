<?php


namespace iikoExchangeBundle\Connection;

use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

abstract class Connection implements ExchangeNodeInterface, ConfigurableExtensionInterface, ConnectionInterface
{

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function jsonSerialize()
	{
		return ['connection_type' => $this->getType()] + $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}
	public function exposeConfiguration(): array
	{
		return [];
	}
}