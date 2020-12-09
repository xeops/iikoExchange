<?php


namespace iikoExchangeBundle\Library\Mapping;


use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

class Mapping implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	public function __construct(string $code)
	{
		$this->code = $code;
	}

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

	const FIELD_IDENTIFIERS = 'identifiers';
	const FIELD_VALUES = 'values';

	/** @var array */
	protected array $identifiers;
	/** @var array */
	protected array $values;

	/**
	 * @return array
	 */
	public function exposeIdentifiers(): array
	{
		return [
			new ConfigItemString("IIKO_FIELD")
		];
	}

	/**
	 * @return array
	 */
	public function exposeValues(): array
	{
		return [
			new ConfigItemString("NAVISION_FIELD")
		];
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize() +
			[
				self::FIELD_VALUES => $this->exposeValues(),
				self::FIELD_IDENTIFIERS => $this->exposeIdentifiers()
			];
	}
}