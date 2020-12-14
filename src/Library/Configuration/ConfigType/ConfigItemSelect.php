<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemSelect extends AbstractConfigItem
{
	const FIELD_OPTION_SET_CODE = 'option_set';

	protected string $optionSetCode;

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
		return parent::jsonSerialize() + [self::FIELD_OPTION_SET_CODE => $this->optionSetCode];
	}
}