<?php

namespace iikoExchangeBundle\Library\OptionSet;

class EmployeeOptionSet extends BaseOptionSet
{
	public static function getCode(): string
	{
		return 'Employee';
	}

	public function getItems(): array
	{
		throw new \Exception('Not implemented');
	}

	public function getRequest()
	{
		throw new \Exception('Not implemented');
	}

	public function processResponse($response): array
	{
		throw new \Exception('Not implemented');
	}
}