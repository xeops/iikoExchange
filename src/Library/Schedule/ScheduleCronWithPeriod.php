<?php


namespace iikoExchangeBundle\Library\Schedule;


use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPeriod;

class ScheduleCronWithPeriod extends ScheduleCron
{
	protected ?string $maxPeriodBreakdown = 'day';


	const CODE = 'SCHEDULE_CRON_PERIOD';

	const CONFIG_ITEM_PERIOD = 'CONFIG_PERIOD';

	public function exposeConfiguration(): array
	{
		return array_merge(parent::exposeConfiguration(), [new ConfigItemPeriod(self::CONFIG_ITEM_PERIOD, null, true, $this->maxPeriodBreakdown)]);
	}

	/**
	 * @return string|null
	 */
	public function getMaxPeriodBreakdown(): ?string
	{
		return $this->maxPeriodBreakdown;
	}

	/**
	 * @param string|null $maxPeriodBreakdown
	 * @return ScheduleCronWithPeriod
	 */
	public function setMaxPeriodBreakdown(?string $maxPeriodBreakdown): ScheduleCronWithPeriod
	{
		$this->maxPeriodBreakdown = $maxPeriodBreakdown;
		return $this;
	}
}