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

	protected ?array $exposedValues = null;
	protected ?array $exposedIdentifiers = null;


	public function getExposedValues(): ?array
	{
		if (null == $this->exposedValues)
		{
			$this->exposedValues = $this->exposeValues();
		}
		return $this->exposedValues;
	}

	public function getExposedIdentifiers(): ?array
	{
		if (null === $this->exposedIdentifiers)
		{
			$this->exposedIdentifiers = $this->exposeIdentifiers();
		}
		return $this->exposedIdentifiers;
	}

	/**
	 * @return bool
	 */
	public function isFullTable(): bool
	{
		return false;
	}


	public function isSelectedTable(): bool
	{
		return false;
	}


	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize() + $this->restaurantJsonSerialize() +
			[
				self::FIELD_FULL_TABLE => $this->isFullTable(),
				self::FIELD_VALUES => $this->getExposedValues(),
				self::FIELD_IDENTIFIERS => $this->getExposedIdentifiers(),
				self::FIELD_SELECTED_TABLE => $this->isSelectedTable()
			];
	}
}