<?php


namespace iikoExchangeBundle\Library\Transform;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Library\Mapping\Mapping;
use iikoExchangeBundle\Library\Request\DataSourceRequest;

abstract class Transformer implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const FIELD_MAPPING = 'mapping';

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

	protected array $mappings;

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function addMapping(Mapping $mapping): self
	{
		$this->mappings[$mapping->getCode()] = $mapping;
		return $this;
	}

	/**
	 * @return Mapping[]
	 */
	public function getMappings(): array
	{
		return $this->mappings;
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

	abstract public function transform(Exchange $exchange, ExchangeEngine $exchangeEngine, $data);

}