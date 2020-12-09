<?php


namespace iikoExchange\Library\Request;


use iikoExchange\Contract\ExchangeNodeInterface;
use iikoExchange\ExtensionTrait\ExchangeNodeTrait;
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