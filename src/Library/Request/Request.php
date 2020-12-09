<?php


namespace iikoExchangeBundle\Library\Request;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use Psr\Http\Message\RequestInterface;

class Request implements ExchangeNodeInterface
{
	use ExchangeNodeTrait;


	public function getRequest(): RequestInterface
	{

	}

	public function jsonSerialize()
	{
		return [
			self::FIELD_CODE
		];
	}
}