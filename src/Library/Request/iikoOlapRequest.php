<?php


namespace iikoExchangeBundle\Library\Request;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithPeriodExtensionInterface;
use iikoExchangeBundle\Contract\Request\IikoRequestInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithPeriodExtensionTrait;
use iikoExchangeBundle\Library\Request\iiko\Report\iikoReportFilter;


abstract class iikoOlapRequest implements IikoRequestInterface, WithPeriodExtensionInterface, ExchangeNodeInterface
{
	public function __construct(string $code)
	{
		$this->code = $code;
	}

	use ExchangeNodeTrait;
	use WithPeriodExtensionTrait;

	const TYPE_SALES = 'SALES';
	const TYPE_TRANSACTIONS = 'TRANSACTIONS';
	const TYPE_DELIVERIES = 'DELIVERIES';

	abstract protected function getType(): string;

	public final function getPath(): string
	{
		return "/resto/api/v2/reports/olap";
	}

	public final function getMethod(): string
	{
		return 'POST';
	}

	public function getQuery(): string
	{
		return "";
	}

	public final function getBody(): array
	{
		return [
			"reportType" => $this->getType(),
			"buildSummary" => false,
			"filters" => array_merge($this->getPeriodFilter(), $this->getFilters()),
			"groupByRowFields" => $this->getGroupFields(),
			"aggregateFields" => $this->getAggregateFields()
		];
	}

	/**
	 * @return string[]
	 * @link
	 */
	abstract protected function getGroupFields(): array;

	abstract protected function getAggregateFields(): array;

	protected function getPeriodFilter(): array
	{
		return [
			($this->getType() === self::TYPE_TRANSACTIONS ? \iikoExchangeBundle\Library\Request\iiko\Report\Transactions\GroupFields::DateTimeOperDayFilter : \iikoExchangeBundle\Library\Request\iiko\Report\Sales\GroupFields::OpenDateTyped) =>

				iikoReportFilter::dateRange(
					$this->getPeriod()->getDateFrom()->setTime(0, 0, 0)->getTimestamp(),
					$this->getPeriod()->getDateTo()->modify('+1 day')->setTime(0, 0, 0)->getTimestamp(),
					true, false, true)
		];

	}

	protected function getFilters(): array
	{
		return [];
	}


	public function getHeaders(): array
	{
		return [
			'Content-Type' => "application/json",
			'Accept' => "application/json,text/plain",
			'Accept-Encoding' => "gzip"
		];

	}

	public function processResponse($data)
	{
		return json_decode($data, true)['data'];
	}


}