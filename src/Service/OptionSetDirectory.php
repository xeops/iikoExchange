<?php

namespace iikoExchangeBundle\Service;

use iikoExchangeBundle\Contract\OptionSet\OptionSetInterface;

class OptionSetDirectory
{
	protected array $collection = [];

	public function addOptionSet(OptionSetInterface $optionSet)
	{
		$this->collection[$optionSet->getCode()] = $optionSet;
	}

	public function getOptionSet(string $optionSetCode): OptionSetInterface
	{
		if (!array_key_exists($optionSetCode, $this->collection))
		{
			throw new \Exception("Option set not found");
		}

		return $this->collection[$optionSetCode];
	}
}