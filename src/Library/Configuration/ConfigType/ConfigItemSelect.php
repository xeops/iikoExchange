<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemSelect extends AbstractConfigItem
{
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
}