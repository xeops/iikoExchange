<?php


namespace iikoExchangeBundle\Contract\Extensions;


use iikoExchangeBundle\Application\Period;

interface WithPeriodExtensionInterface
{
	const FIELD_PERIOD = 'period';

	/**
	 * @param $period
	 * @return mixed
	 */
	public function setPeriod($period);

	/**
	 * @return Period
	 */
	public function getPeriod();

	public function byDays() : bool;
}