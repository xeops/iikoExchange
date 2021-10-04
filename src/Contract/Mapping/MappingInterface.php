<?php


namespace iikoExchangeBundle\Contract\Mapping;


use iikoExchangeBundle\Contract\Configuration\ConfigType\ConfigItemInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;

interface MappingInterface extends ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const FIELD_IDENTIFIERS = 'identifiers';
	const FIELD_VALUES = 'values';
	const FIELD_FULL_TABLE = 'full';
	const FIELD_SELECTED_TABLE = 'selected';

	/**
	 * @return ConfigItemInterface[]
	 */
	public function exposeIdentifiers(): array;
	/**
	 * @return ConfigItemInterface[]
	 */
	public function exposeValues(): array;

	public function getExposedValues(): ?array;

	public function getExposedIdentifiers(): ?array;
}