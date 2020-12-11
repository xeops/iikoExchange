<?php


namespace iikoExchangeBundle\Library\Mapping;


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

	/**
	 * @inheritDoc
	 */
	public function setCollection(array $collection): void
	{
		$this->collection = \SplFixedArray::fromArray($collection, false);
	}

	/**
	 * @inheritDoc
	 */
	public function getValue($identifiers, $valueCode, bool $throwNotFound = true)
	{
		$identifiers = array($identifiers);
		foreach ($this->collection as $item)
		{
			if (!array_diff_assoc($item[self::FIELD_IDENTIFIERS], $identifiers) && array_key_exists($valueCode, $item[self::FIELD_VALUES]))
			{
				return $item[self::FIELD_VALUES][$valueCode];
			}
		}
		if ($throwNotFound)
		{
			throw new \Exception("mapping not found");
		}
		return null;
	}


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