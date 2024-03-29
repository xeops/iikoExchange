<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Contract\Mapping\MappingInterface;
use iikoExchangeBundle\Exception\MappingNotFoundException;

trait WithMappingExtensionTrait
{
	protected array $mapping = [];
	/** @var MappingInterface[] */
	protected array $mappingValues = [];

	/**
	 * @param string $mappingCode
	 * @param array|string|int|float $identifiers associative array, ex. ['PayType' => 'Visa', 'Tax Type' => 'Not Vat']
	 * @param string $valueCode collection might have many values in each row, you should specify what value you want
	 * @return mixed
	 * @throws \Exception
	 */
	public function getMappingValue(string $mappingCode, array $identifiers, string $valueCode)
	{
		foreach ($this->getMappingValues()[$mappingCode] ?? [] as $item)
		{
			if (!array_diff_assoc($item[MappingInterface::FIELD_IDENTIFIERS], $identifiers) && array_key_exists($valueCode, $item[MappingInterface::FIELD_VALUES]))
			{
				$value =  $item[MappingInterface::FIELD_VALUES][$valueCode];

				if(is_string($value))
				{
					foreach ($identifiers as $identifierCode => $identifierValue)
					{
						 $value = strtr($value, ["%$identifierCode%" => $identifierValue]);
					}
				}

				return $value;
			}
		}

		throw new MappingNotFoundException($mappingCode, $identifiers);
	}

	/**
	 * @return MappingInterface[]
	 */
	public function getMappingValues(): array
	{
		return $this->mappingValues;
	}

	/**
	 * @param string $mappingCode
	 * @param array $mapping array of associative arrays. ex [ 0 => [identifiers => ['PayType' => 'Visa', 'Tax Type' => 'No Vat'], 'values' => 'Account' => 'Non cache without Tax'] ]
	 * @return mixed
	 */
	public function setMappingValues(string $mappingCode, array $mapping)
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

	public function getUniqMappingIdentifiers(string $mappingCode, string $identifier)
	{
		$result = [];
		foreach ($this->getMappingValues()[$mappingCode] ?? [] as $item)
		{
			$result[] = $item[MappingInterface::FIELD_IDENTIFIERS][$identifier];
		}
		return array_unique($result);
	}
}