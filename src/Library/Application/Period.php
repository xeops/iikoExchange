<?php

namespace iikoExchangeBundle\Application;

class Period
{
	private \DateTime $dateFrom;
	private \DateTime $dateTo;

	/**
	 * @return \DateTime
	 */
	public function getDateFrom(): \DateTime
	{
		return $this->dateFrom;
	}

	/**
	 * @param \DateTime $dateFrom
	 */
	public function setDateFrom(\DateTime $dateFrom): void
	{
		$this->dateFrom = $dateFrom;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateTo(): \DateTime
	{
		return $this->dateTo;
	}

	/**
	 * @param \DateTime $dateTo
	 */
	public function setDateTo(\DateTime $dateTo): void
	{
		$this->dateTo = $dateTo;
	}


}