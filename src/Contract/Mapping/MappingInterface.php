<?php


namespace iikoExchangeBundle\Contract\Mapping;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;

interface MappingInterface extends ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const FIELD_IDENTIFIERS = 'identifiers';
	const FIELD_VALUES = 'values';
	const FIELD_FULL_TABLE = 'full';

	public function exposeIdentifiers(): array;

	public function exposeValues(): array;


}