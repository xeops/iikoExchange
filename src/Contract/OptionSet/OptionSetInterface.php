<?php

namespace iikoExchangeBundle\Contract\OptionSet;

interface OptionSetInterface
{
	public static function getCode(): string;

	public function getItems(): array;
}