<?php

namespace iikoExchangeBundle\Configuration\ConfigType;

class ConfigItemBoolean  extends AbstractConfigItem
{

	public function getType()
	{
		return self::TYPE_BOOLEAN;
	}

	public function validate($value): bool
	{
		return is_bool($value);
	}

	public function setValue($value)
	{
		$this->value = boolval($value);
		return $this;
	}
}