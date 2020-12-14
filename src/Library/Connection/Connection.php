<?php


namespace iikoExchangeBundle\Connection;

use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

abstract class Connection implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const CONFIG_HOST = 'host';

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
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

	/**
	 * @param mixed $request
	 * @return mixed
	 */
	abstract public function sendRequest($request);

	public function exposeConfiguration(): array
	{
		return [
			new ConfigItemString(self::CONFIG_HOST)
		];
	}
}