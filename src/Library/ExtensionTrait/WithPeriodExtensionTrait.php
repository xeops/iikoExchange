<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Contract\Extensions\CalendarPeriodInterface;

trait WithPeriodExtensionTrait
{
	protected $period;

	protected bool $breakByDays = true;

	/**
	 * @return CalendarPeriodInterface
	 */
	public function getPeriod()
	{
		return $this->period;
	}

	/**
	 * @param CalendarPeriodInterface $period
	 */
	public function setPeriod($period): void
	{
		$this->period = $period;
	}

	public function byDays(): bool
	{
		return $this->breakByDays;
	}
}