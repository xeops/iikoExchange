<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemPeriod extends AbstractConfigItem
{
	private string $maxPeriod;

	public function __construct(string $code, ?string $value = null, $required = true, ?string $maxPeriod = 'hour')
	{
		if ($value !== null)
		{
			list($this->diffType, $this->count, $this->periodType) = explode(" ", $value);
		}
		parent::__construct($code, $value, $required);
		$this->maxPeriod = $maxPeriod;
	}

	const FIELD_PERIOD_DIFF_TYPE = 'period_diff_type';
	const FIELD_PERIOD_COUNT = 'period_count';
	const FIELD_PERIOD_TYPE = 'period_type';

	const FIELD_CONSTANTS = 'constants';

	const FIELD_DIFF_TYPES = ['previous', 'current', 'next'];
	//TODO constants
	const FIELD_PERIOD_TYPES = ['minute', 'hour', 'day', 'week', 'month', 'year'];

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
		$periodTypes = self::FIELD_PERIOD_TYPES;
		return parent::jsonSerialize() +
			[
				self::FIELD_CONSTANTS =>
					[
						self::FIELD_PERIOD_DIFF_TYPE => self::FIELD_DIFF_TYPES,
						self::FIELD_PERIOD_TYPE => $this->maxPeriod === null ? $periodTypes : array_splice($periodTypes, 0, array_search($this->maxPeriod, $periodTypes) + 1)
					]
			];
	}
}