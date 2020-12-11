<?php


namespace iikoExchangeBundle\Configuration\ConfigType;


use iikoExchangeBundle\Contract\Configuration\ConfigType\ConfigItemInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

abstract class AbstractConfigItem implements ConfigItemInterface
{
	public function __construct(string $code, ?string $value = null, $required = true)
	{
		$this->code = $code;
		$this->value = $value;
		$this->required = $required;
	}

	/** @var mixed */
	protected $value = null;
	protected bool $required = true;

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as nodeJsonSerialize;
	}


	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}

	public function getValue()
	{
		return $this->value;
	}


	public function getRequired(): bool
	{
		return $this->required;
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() +
			[
				self::FIELD_TYPE => $this->getType(),
				self::FIELD_VALUE => $this->getValue(),
				self::FIELD_REQUIRED => $this->getRequired()
			];
	}
}