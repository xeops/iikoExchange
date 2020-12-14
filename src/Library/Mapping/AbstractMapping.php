<?php


namespace iikoExchangeBundle\Mapping;


use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Mapping\MappingInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\ExtensionTrait\WithRestaurantExtensionTrait;

abstract class AbstractMapping implements MappingInterface, WithRestaurantExtensionInterface
{
	public function __construct(string $code)
	{
		$this->code = $code;
	}

	use WithRestaurantExtensionTrait
	{
		WithRestaurantExtensionTrait::jsonSerialize as restaurantJsonSerialize;
	}
	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

	protected \SplFixedArray $collection;



	protected bool $fullTable = false;


	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize() + $this->restaurantJsonSerialize() +
			[
				self::FIELD_FULL_TABLE => $this->fullTable,
				self::FIELD_VALUES => $this->exposeValues(),
				self::FIELD_IDENTIFIERS => $this->exposeIdentifiers()
			];
	}
}