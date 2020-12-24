<?php


namespace iikoExchangeBundle\Library\Schedule;


use iikoExchangeBundle\Configuration\ConfigType\ConfigItemCronExpression;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

class ScheduleCron implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const CONFIG_ITEM_VALUE = 'CONFIG_EXPRESSION';

	const CODE = 'SCHEDULE_CRON';


	public function __construct()
	{
		$this->code = static::CODE;
	}


	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}


	public function exposeConfiguration(): array
	{
		return [
			new ConfigItemCronExpression(self::CONFIG_ITEM_VALUE, "0 7 * * *")
		];
	}


	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

}