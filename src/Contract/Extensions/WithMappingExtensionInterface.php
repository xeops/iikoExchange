<?php


namespace iikoExchangeBundle\Contract\Extensions;


use iikoExchangeBundle\Contract\Mapping\MappingInterface;

interface WithMappingExtensionInterface
{
	const FIELD_MAPPING = 'mapping';


	public function getMappingValues(): array;

	public function setMappingValues(string $mappingCode, array $mapping);

	public function addMapping(MappingInterface $mapping);

	/**
	 * @return MappingInterface[]
	 */
	public function getMapping(): array;
}