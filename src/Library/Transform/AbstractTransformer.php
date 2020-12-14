<?php


namespace iikoExchangeBundle\Library\Transform;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Mapping\MappingInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

abstract class AbstractTransformer implements ExchangeNodeInterface, ConfigurableExtensionInterface
{

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

	abstract public function transform(Exchange $exchange, ExchangeEngine $exchangeEngine, $data);
}