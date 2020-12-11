<?php

namespace iikoExchangeBundle\Library\Request\iiko\Report;

class iikoReportFilter
{

	const FILTER_DATERANGE = "DateRange";
	const VALUE_LIST_EXCLUDE = true;
	const VALUE_LIST_INCLUDE = false;
	const DATE_RANGE_INCLUSIVE_FROM = true;
	const DATE_RANGE_EXCLUSIVE_FROM = false;
	const DATE_RANGE_INCLUSIVE_TO = true;
	const DATE_RANGE_EXCLUSIVE_TO = false;

	const VALUE_RANGE_EXCLUSIVE_MIN = false;
	const VALUE_RANGE_INCLUSIVE_MIN = true;

	const VALUE_RANGE_EXCLUSIVE_MAX = false;
	const VALUE_RANGE_INCLUSIVE_MAX = true;

	const DATE_RANGE_PRECISION_TIME = true;
	const DATE_RANGE_PRECISION_DATE = false;

	/**
	 * datePeriod function.
	 *
	 * @access public
	 * @static
	 * @param string $period (default=> "TODAY")
	 * @return array
	 */
	public static function datePeriod($period = "TODAY")
	{

		return array(
			"filterType" => "DateRange",
			"periodType" => $period,
		);

	}


	/**
	 * daysBefore function.
	 *
	 * @access public
	 * @static
	 * @param int $days (default: 30)
	 * @param bool $useTime (default: false)
	 * @return array
	 */
	public static function daysBefore($days = 30, $useTime = false)
	{

		$now = time();
		$m = date('m', $now);
		$d = date('d', $now);
		$y = date('Y', $now);

		$from = mktime(0, 0, 0, $m, $d - $days, $y);

		$mask = $useTime ? "Y-m-d H:i:s" : "Y-m-d";


		return array(
			"filterType" => "DateRange",
			"periodType" => "CUSTOM",
			"from" => date($mask, $from),
			"to" => date($mask, $now),
			"includeLow" => true,
			"includeHigh" => false

		);


	}


	/**
	 * dateRange function.
	 *
	 * @access public
	 * @static
	 * @param mixed $dateFrom
	 * @param mixed $dateTo
	 * @param bool $inclusiveFrom (default: true)
	 * @param bool $inclusiveTo (default: false)
	 * @param bool $useTime (default: false)
	 * @return array
	 */
	public static function dateRange($dateFrom, $dateTo, $inclusiveFrom = true, $inclusiveTo = false, $useTime = false)
	{

		$mask = "Y-m-d";
		$from = date($mask, $dateFrom);
		$to = date($mask, $dateTo);

		if ($useTime) {
			$maskTime = "H:i:s";
			$from .= "T" . date($maskTime, $dateFrom);
			$to .= "T" . date($maskTime, $dateTo);

		}


		return array(
			"filterType" => "DateRange",
			"periodType" => "CUSTOM",
			"from" => $from,
			"to" => $to,
			"includeLow" => $inclusiveFrom,
			"includeHigh" => $inclusiveTo

		);


	}


	/**
	 * valueRange function.
	 *
	 * @access public
	 * @static
	 * @param mixed $min
	 * @param mixed $max
	 * @param bool $minInclusive (default=> true)
	 * @param bool $maxInclusive (default=> false)
	 * @return array
	 */
	public static function valueRange($min, $max, $minInclusive = true, $maxInclusive = false)
	{

		return array(
			"filterType" => "Range",
			"from" => $min,
			"to" => $max,
			"includeLow" => $minInclusive,
			"includeHigh" => $maxInclusive
		);

	}


	/**
	 * valueList function.
	 *
	 * @access public
	 * @static
	 * @param mixed $vals
	 * @param bool $exclude (default=> false)
	 * @return array
	 */
	public static function valueList($vals, $exclude = false)
	{

		return array(
			"filterType" => $exclude ? "ExcludeValues" : "IncludeValues",
			"values" => $vals
		);

	}


	/**
	 * notEmpty function.
	 *
	 * @access public
	 * @static
	 * @return array
	 */
	public static function notEmpty()
	{

		return array(
			"filterType" => "ExcludeValues",
			"values" => array(null)
		);

	}


}