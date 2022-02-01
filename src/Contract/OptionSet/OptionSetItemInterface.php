<?php

namespace iikoExchangeBundle\Contract\OptionSet;

interface OptionSetItemInterface extends \JsonSerializable
{
	public function getValue();

	public function getName()  : string;
}