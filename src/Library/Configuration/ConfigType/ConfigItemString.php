<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemString extends AbstractConfigItem
{


	public function getType(): string
	{
		return self::TYPE_STRING;
	}

	public function setValue($value)
	{
		$this->value = strval($value);
		return $this;
	}

	public function validate($value): bool
	{
		return is_string($value);
	}
}