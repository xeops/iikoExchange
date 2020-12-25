<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemInt extends AbstractConfigItem
{

	public function getType()
	{
		return self::TYPE_INT;
	}

	public function validate($value): bool
	{
		return is_int($value);
	}
}