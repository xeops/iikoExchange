<?php


namespace iikoExchangeBundle\Library\Schedule;


use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPeriod;

class ScheduleCronWithPeriod extends ScheduleCron
{
	const CODE = 'SCHEDULE_CRON_PERIOD';

	const CONFIG_ITEM_PERIOD = 'CONFIG_PERIOD';


	public function exposeConfiguration(): array
	{
		return array_merge(parent::exposeConfiguration(), [new ConfigItemPeriod(self::CONFIG_ITEM_PERIOD)]);
	}
}