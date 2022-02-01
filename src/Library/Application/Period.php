<?php

namespace iikoExchangeBundle\Application;

class Period
{
	private \DateTimeImmutable $dateFrom;
	private \DateTimeImmutable $dateTo;

	/**
	 * @param $dateFrom
	 * @param $dateTo
	 */
	public function __construct($dateFrom, $dateTo)
	{
		$this->dateFrom = $dateFrom instanceof \DateTime ? (new \DateTimeImmutable())->setTimestamp($dateFrom->getTimestamp()) : (is_int($dateFrom) ? (new \DateTimeImmutable())->setTimestamp($dateFrom) : (new \DateTimeImmutable($dateFrom)));
		$this->dateTo = $dateTo instanceof \DateTime ? (new \DateTimeImmutable())->setTimestamp($dateTo->getTimestamp()) : (is_int($dateTo) ? (new \DateTimeImmutable())->setTimestamp($dateTo) : (new \DateTimeImmutable($dateTo)));
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getDateFrom(): \DateTimeImmutable
	{
		return $this->dateFrom;
	}

	/**
	 * @param \DateTimeImmutable $dateFrom
	 * @return Period
	 */
	public function setDateFrom(\DateTimeImmutable $dateFrom): Period
	{
		$this->dateFrom = $dateFrom;
		return $this;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getDateTo(): \DateTimeImmutable
	{
		return $this->dateTo;
	}

	/**
	 * @param \DateTimeImmutable $dateTo
	 * @return Period
	 */
	public function setDateTo(\DateTimeImmutable $dateTo): Period
	{
		$this->dateTo = $dateTo;
		return $this;
	}

	public function getDurationInDays()
	{
		return $this->dateTo->diff($this->dateFrom)->days + 1;
	}

	/** @inheritdoc */
	public function getReadableRange(): string
	{
		if ($this->dateFrom->format('m') == $this->dateTo->format('m'))
		{

			if ($this->dateFrom->format('j') == $this->dateTo->format('j'))
			{
				$periodName = strftime('%e %b %Y', $this->dateTo->getTimestamp());
			}
			else
			{
				$periodName = strftime('%e', $this->dateFrom->getTimestamp()) . '—' . trim(strftime('%e %b %Y', $this->dateTo->getTimestamp()));
			}

		}
		else if ($this->dateFrom->format('Y') == $this->dateTo->format('Y'))
		{
			$periodName = strftime('%e %b', $this->dateFrom->getTimestamp()) . '—' . trim(strftime('%e %b %Y', $this->dateTo->getTimestamp()));
		}
		else
		{
			$periodName = strftime('%e %b %Y', $this->dateFrom->getTimestamp()) . '—' . trim(strftime('%e %b %Y', $this->dateTo->getTimestamp()));
		}

		return $periodName;
	}

	public function withTimeZone(\DateTimeZone $timeZone)
	{
		return (clone $this)->setDateFrom($this->getDateFrom()->setTimezone($timeZone))->setDateTo($this->getDateTo()->setTimezone($timeZone));
	}

}