<?php


namespace iikoExchangeBundle\Contract\Extensions;


interface WithPeriodExtensionInterface
{
	const FIELD_PERIOD = 'period';

	/**
	 * @param $period
	 * @return mixed
	 */
	public function setPeriod($period);

	/**
	 * @return CalendarPeriodInterface
	 */
	public function getPeriod();

	public function byDays() : bool;
}