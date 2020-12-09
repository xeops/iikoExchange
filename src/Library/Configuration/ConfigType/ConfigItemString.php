<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

class ConfigItemString implements ExchangeNodeInterface
{
	const FIELD_TYPE = 'type';
	const FIELD_VALUE = 'value';

	protected $value;

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as nodeJsonSerialize;
	}

	public function getType(): string
	{
		return "string";
	}

	/**
	 * @return string|\JsonSerializable
	 */
	public function getValue()
	{
		return $this->value;
	}

	public function setValue($value)
	{
		$this->value = strval($value);
	}

	public function validate($value): bool
	{
		return is_string($value);
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize();
	}
}