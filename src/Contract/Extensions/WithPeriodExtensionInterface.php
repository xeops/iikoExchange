<?php


namespace iikoExchangeBundle\Contract\Extensions;


interface WithPeriodExtensionInterface
{
	public function setPeriod($period);

	public function getPeriod();
}