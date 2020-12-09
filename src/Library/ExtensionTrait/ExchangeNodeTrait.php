<?php


namespace iikoExchange\ExtensionTrait;


trait ExchangeNodeTrait
{

	protected string $code;

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

}