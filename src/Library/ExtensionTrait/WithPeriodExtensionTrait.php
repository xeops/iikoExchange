<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Application\Period;

trait WithPeriodExtensionTrait
{
	protected $period;

	protected bool $breakByDays = true;

	/**
	 * @return Period
	 */
	public function getPeriod()
	{
		return $this->period;
	}

	/**
	 * @param Period $period
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