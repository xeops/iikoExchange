<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemTags extends AbstractConfigItem
{

	public function getType()
	{
		return self::TYPE_TAGS;
	}

	public function validate($value): bool
	{
		return is_array($value);
	}

	public function getValue()
	{
		return $this->value ?? [];
	}
}