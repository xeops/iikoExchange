<?php


namespace iikoExchangeBundle\ExtensionTrait;


trait WithPeriodExtensionTrait
{
	protected $period;

	/**
	 * @return mixed
	 */
	public function getPeriod()
	{
		return $this->period;
	}

	/**
	 * @param mixed $period
	 */
	public function setPeriod($period): void
	{
		$this->period = $period;
	}
}