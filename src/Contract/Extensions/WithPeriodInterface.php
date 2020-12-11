<?php


namespace iikoExchangeBundle\Contract\Extensions;


interface WithPeriodInterface
{
	public function setPeriod($period);

	public function getPeriod();
}