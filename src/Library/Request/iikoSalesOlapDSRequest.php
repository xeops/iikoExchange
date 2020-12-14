<?php


namespace iikoExchangeBundle\Library\Request;


use iikoExchangeBundle\Contract\Extensions\WithPeriodExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\WithPeriodExtensionTrait;
use iikoExchangeBundle\Library\Request\iiko\Report\iikoReportFilter;

abstract class iikoSalesOlapDSRequest extends DataSourceRequest implements WithPeriodExtensionInterface
{
	use WithPeriodExtensionTrait;

	const TYPE_SALES = "SALES";
	const TYPE_TRANSACTIONS = "TRANSACTIONS";

	/**
	 * @return iikoSalesOlapDSRequest
	 */
	public function getRequest()
	{
		return $this;
	}

	public function getFilters()
	{
		return [
			"OpenDate.Typed" => iikoReportFilter::dateRange($this->getPeriod()->getStartDate()->getTimestamp(), $this->getPeriod()->getEndDate()->getTimestamp())
		];
	}

	public function getGroupFields() : array
	{
		return [];
	}

	public function getAggregateFields() : array
	{
		return [];
	}

	abstract  public function getType() : string;

	public function processResponse(string $data)
	{
		return json_decode($data, true);
	}

}