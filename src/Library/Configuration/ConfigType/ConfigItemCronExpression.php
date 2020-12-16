<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemCronExpression extends AbstractConfigItem
{
	public function getType(): string
	{
		return self::TYPE_CRON;
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