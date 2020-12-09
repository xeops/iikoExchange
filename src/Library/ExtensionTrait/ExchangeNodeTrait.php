<?php


namespace iikoExchangeBundle\ExtensionTrait;


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


	public function jsonSerialize()
	{
		return [
			self::FIELD_CODE => $this->getCode(),
			self::FIELD_NAME => $this->getCode(),
			self::FIELD_DESCRIPTION => $this->getCode(),
		];
	}

}