<?php


namespace iikoExchangeBundle\Library\Request;


use GuzzleHttp\Psr7\Request;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use Psr\Http\Message\ResponseInterface;

abstract class DataSourceRequest implements ExchangeNodeInterface, ConfigurableExtensionInterface
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

	abstract public function getRequest();

	public function jsonSerialize()
	{
		return $this->nodeJsonSerialize() + $this->configJsonSerialize();
	}

	abstract public function processResponse(string $data);

}