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

	/**
	 * @param array $collection array of associative arrays. ex [ 0 => [identifiers => ['PayType' => 'Visa', 'Tax Type' => 'No Vat'], 'values' => 'Account' => 'Non cache without Tax'] ]
	 * @return mixed
	 */
	public function setCollection(array $collection);

	/**
	 * @param array|string|int|float $identifiers associative array, ex. ['PayType' => 'Visa', 'Tax Type' => 'Not Vat']
	 * @param string $valueCode collection might have many values in each row, you should specify what value you want
	 * @param bool $throwNotFound if true - throw NotMappingFound exception
	 * @return mixed
	 * @throws \Exception
	 */
	public function getValue($identifiers, string $valueCode, bool $throwNotFound = true);
}