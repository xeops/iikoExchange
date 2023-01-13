<?php


namespace iikoExchangeBundle\Contract\Extensions;


use iikoExchangeBundle\Contract\Mapping\MappingInterface;

interface WithMappingExtensionInterface
{
	public const EXTENDED = 1;
	public const ANY = 0;
	public const NOT_EXTENDED = -1;


	const FIELD_MAPPING = 'mapping';


	public function getMappingValues(): array;

	public function setMappingValues(string $mappingCode, array $mapping);

	public function addMapping(MappingInterface $mapping);

	/**
	 * @return MappingInterface[]
	 */
	public function getMapping(): array;
}