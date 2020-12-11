<?php


namespace iikoExchangeBundle\Library\Transform;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Mapping\MappingInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

abstract class AbstractTransformer implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const FIELD_MAPPING = 'mapping';

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

	/** @var MappingInterface[] */
	protected array $mappings;

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function addMapping(MappingInterface $mapping): self
	{
		$this->mappings[$mapping->getCode()] = $mapping;
		return $this;
	}

	/**
	 * @return MappingInterface[]
	 */
	public function getMappings(): array
	{
		return $this->mappings;
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

	abstract public function transform(Exchange $exchange, ExchangeEngine $exchangeEngine, $data);

	protected function getMappingValue(string $mappingCode, $identifiers, $valueCode)
	{
		return $this->mappings[$mappingCode]->getValue($identifiers, $valueCode);
	}

	public function getChildNodes(): array
	{
		return $this->getMappings();
	}
}