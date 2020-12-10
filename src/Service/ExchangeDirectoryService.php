<?php


namespace iikoExchangeBundle\Service;


use iikoExchangeBundle\Exchange\AbstractExchangeBuilder;

class ExchangeDirectoryService
{
	/** @var AbstractExchangeBuilder[] */
	protected array $exchanges = [];

	public function addExchange(AbstractExchangeBuilder $exchange)
	{
		$this->exchanges[$exchange->getCode()] = $exchange;
	}

	public function getCollection(): array
	{
		return $this->exchanges;
	}

	public function getExchangeByCode(string $code) : AbstractExchangeBuilder
	{
		return $this->getCollection()[$code];
	}
}