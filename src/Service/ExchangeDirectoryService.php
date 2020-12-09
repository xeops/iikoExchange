<?php


namespace iikoExchange\Service;


use iikoExchange\Exchange\Exchange;

class ExchangeDirectoryService
{
	protected array $exchanges = [];

	public function addExchange(Exchange $exchange)
	{
		$this->exchanges[$exchange->getCode()] = $exchange;
	}

	public function getCollection(): array
	{
		return $this->exchanges;
	}
}