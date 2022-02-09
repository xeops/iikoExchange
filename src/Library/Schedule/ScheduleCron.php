<?php


namespace iikoExchangeBundle\Library\Schedule;


use iikoExchangeBundle\Configuration\ConfigType\ConfigItemCronExpression;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPeriod;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemSelect;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Library\OptionSet\TimeZoneOptionSet;

class ScheduleCron implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const CONFIG_ITEM_VALUE = 'CONFIG_EXPRESSION';
	const CONFIG_ITEM_TIME_ZONE = 'CONFIG_TIME_ZONE';
	const CONFIG_ITEM_PERIOD = 'CONFIG_PERIOD';

	protected ?string $maxPeriodBreakdown = 'day';

	protected bool $withPeriod = true;
	protected bool $withTimeZone = false;

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
		$config = [
			new ConfigItemCronExpression(self::CONFIG_ITEM_VALUE, "0 7 * * *")
		];
		if ($this->withPeriod)
		{
			$config[] = new ConfigItemPeriod(self::CONFIG_ITEM_PERIOD, null, true, $this->maxPeriodBreakdown);
		}
		if ($this->withTimeZone)
		{
			$config[] = new ConfigItemSelect(self::CONFIG_ITEM_TIME_ZONE, TimeZoneOptionSet::getCode(), date_default_timezone_get());
		}

		return $config;
	}


	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

	/**
	 * @param bool $withPeriod
	 */
	public function setWithPeriod(bool $withPeriod): void
	{
		$this->withPeriod = $withPeriod;
	}

	/**
	 * @param bool $withTimeZone
	 */
	public function setWithTimeZone(bool $withTimeZone): void
	{
		$this->withTimeZone = $withTimeZone;
	}

	/**
	 * @return bool
	 */
	public function isWithPeriod(): bool
	{
		return $this->withPeriod;
	}

	/**
	 * @return bool
	 */
	public function isWithTimeZone(): bool
	{
		return $this->withTimeZone;
	}
}