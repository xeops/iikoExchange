<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Contract\Mapping\MappingInterface;

trait WithMappingExtensionTrait
{
	protected array $mapping;

	protected array $mappingValues;

	protected function getMappingValue(string $mappingCode, $identifiers, $valueCode)
	{
		return $this->getMappingValues()[$mappingCode]->getValue($identifiers, $valueCode);
	}

	public function getMappingValues(): array
	{
		return $this->mappingValues;
	}

	public function saveMappingValues(string $mappingCode, array $mapping)
	{
		$this->mappingValues[$mappingCode] = $mapping;
	}

	public function addMapping(MappingInterface $mapping)
	{
		$this->mapping[$mapping->getCode()] = $mapping;
	}

	/**
	 * @return array
	 */
	public function getMapping(): array
	{
		return $this->mapping;
	}
}