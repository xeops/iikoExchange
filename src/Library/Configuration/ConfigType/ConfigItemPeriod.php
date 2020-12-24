<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


use AppBundle\Service\Calendar\CalendarPeriodDay;
use AppBundle\Service\Calendar\CalendarPeriodMonth;
use AppBundle\Service\Calendar\CalendarPeriodWeek;
use AppBundle\Service\Calendar\CalendarPeriodYear;

class ConfigItemPeriod extends AbstractConfigItem
{
	public function __construct(string $code, ?string $value = null, $required = true)
	{
		if ($value !== null)
		{
			list($this->diffType, $this->count, $this->periodType) = explode(" ", $value);
		}
		parent::__construct($code, $value, $required);
	}

	const FIELD_PERIOD_DIFF_TYPE = 'period_diff_type';
	const FIELD_PERIOD_COUNT = 'period_count';
	const FIELD_PERIOD_TYPE = 'period_type';

	const FIELD_CONSTANTS = 'constants';

	const FIELD_DIFF_TYPES = ['previous', 'current', 'next'];
	//TODO constants
	const FIELD_PERIOD_TYPES = ['hour', 'day', 'week', 'month', 'year'];

	protected string $diffType = 'previous';
	protected int $count = 1;
	protected string $periodType = 'day';


	public function getType()
	{
		return self::TYPE_PERIOD;
	}

	public function validate($value): bool
	{
		return true;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return implode(" ", [
			self::FIELD_PERIOD_DIFF_TYPE => $this->diffType,
			self::FIELD_PERIOD_COUNT => $this->count,
			self::FIELD_PERIOD_TYPE => $this->periodType
		]);
	}


	public function jsonSerialize()
	{
		return parent::jsonSerialize() +
			[
				self::FIELD_CONSTANTS =>
					[
						self::FIELD_PERIOD_DIFF_TYPE => self::FIELD_DIFF_TYPES,
						self::FIELD_PERIOD_TYPE => self::FIELD_PERIOD_TYPES
					]
			];
	}
}