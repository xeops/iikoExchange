<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


class ConfigItemPassword extends ConfigItemString
{
    public function getType(): string
    {
	    return self::TYPE_PASSWORD;
    }
}