<?php


namespace iikoExchangeBundle\Service;


use iikoExchangeBundle\Exchange\AbstractExchangeBuilder;
use iikoExchangeBundle\Exchange\Exchange;

class ExchangeDirectoryService
{
	/** @var Exchange[] */
	protected array $exchanges = [];

	public function addExchange(Exchange $exchange)
	{
		$this->exchanges[$exchange->getCode()] = $exchange;
	}

	public function getCollection(): array
	{
		return $this->exchanges;
	}

	public function getExchangeByCode(string $code, int $id = null) : Exchange
	{
		return (clone $this->getCollection()[$code])->setId($id);
	}
}