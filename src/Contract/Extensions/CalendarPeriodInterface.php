<?php


namespace iikoExchangeBundle\Contract\Extensions;



interface CalendarPeriodInterface
{
	/**
	 * Gets start of the period
	 * @return \DateTime
	 */
	public function getStartDate() : \DateTime;

	/**
	 * Gets end date of the period
	 * @return \DateTime
	 */
	public function getEndDate() : \DateTime;

	/**
	 * Get end date without cloning
	 * @return \DateTime
	 */
	public function getSourceEndDate() : \DateTime;

	/**
	 * Get start day without cloning
	 * @return \DateTime
	 */
	public function getSourceStartDate() : \DateTime;
	/**
	 * Gets duration of the period in days
	 * @return int
	 */
	public function getDurationInDays();

	/**
	 * Gets next period
	 * @return CalendarPeriodInterface
	 */
	public function getLastPeriod() : CalendarPeriodInterface;

	/**
	 * Gets previous period
	 * @return CalendarPeriodInterface
	 */
	public function getNextPeriod() : CalendarPeriodInterface;

	/**
	 * Gets readable representation of a period (e.g. Year 2017)
	 * @return string
	 */
	public function getReadableRepresentation() : string;

	/**
	 * Gets readable representation of a date range (e.g. 1—12.07.2017)
	 * @return string
	 */
	public function getReadableRange() : string;


	/**
	 * Gets code of the period within the calendar
	 * @return string
	 */
	public function getPeriodCode() : string;

	/**
	 * Gets type of the period (one of the predefined types)
	 * @return string
	 */
	public function getPeriodType() : string;

	/**
	 * Возвращает дату в формате календаря для генерации массивов и матриц по периодам
	 * @param \Datetime $date
	 * @return string
	 */
	public function makeDateKey(\Datetime $date) : string;

	/**
	 * задать родительский календарь, от которого создался исходый
	 * @param CalendarPeriodInterface $parendCalendar
	 */
	public function setParendCalendar(CalendarPeriodInterface $parendCalendar);

	/**
	 * Возвращает признак того, что интервал - созданный относительно другого интрвала
	 * @return bool
	 */
	public function isPreviousPeriod() : bool;

	/**
	 * Метод получения ключа для периода
	 * @return string
	 */
	public function getIndex();
}