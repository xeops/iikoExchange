<?php


namespace iikoExchangeBundle\Contract;


interface ExchangeNodeInterface extends \JsonSerializable
{
	const FIELD_CODE = 'code';
	const FIELD_NAME = 'name';
	const FIELD_DESCRIPTION = 'description';

	public function getCode(): string;
}