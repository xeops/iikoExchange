<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemSelect extends AbstractConfigItem
{
	const FIELD_OPTION_SET_CODE = 'option_set_code';
	const FIELD_OPTION_BY_RESTAURANT = 'by_store';

	public function __construct(string $code, string $optionSetCode, ?string $value = null, $required = true, bool $byRestaurant = false)
	{
		parent::__construct($code, $value, $required);
		$this->optionSetCode = $optionSetCode;
		$this->byRestaurant = $byRestaurant;
	}

	protected string $optionSetCode;
	protected bool $byRestaurant;

	/**
	 * @param string $optionSetCode
	 * @return $this
	 */
	public function setOptionSetCode(string $optionSetCode)
	{
		$this->optionSetCode = $optionSetCode;
		return $this;
	}

	public function getType()
	{
		return self::TYPE_SELECT;
	}

	public function validate($value): bool
	{
		return true;
	}

	public function jsonSerialize()
	{
		return parent::jsonSerialize() + [self::FIELD_OPTION_SET_CODE => $this->optionSetCode, self::FIELD_OPTION_BY_RESTAURANT => $this->byRestaurant];
	}

	/**
	 * @return string
	 */
	public function getOptionSetCode(): string
	{
		return $this->optionSetCode;
	}
}