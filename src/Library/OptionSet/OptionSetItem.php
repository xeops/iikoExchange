<?php

namespace iikoExchangeBundle\Library\OptionSet;

use iikoExchangeBundle\Contract\OptionSet\OptionSetItemInterface;

class OptionSetItem implements OptionSetItemInterface
{
	private $value;
	private string $name;

	public function __construct(string $name, $value)
	{
		$this->value = $value;
		$this->name = $name;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getName() : string
	{
		return $this->name;
	}

	public function jsonSerialize()
	{
		return
			[
				'key' => $this->getValue(),
				'value' => $this->getName()
			];
	}
}