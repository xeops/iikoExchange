<?php


namespace iikoExchangeBundle\Contract\Configuration\ConfigType;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface ConfigItemInterface extends ExchangeNodeInterface
{
	const FIELD_TYPE = 'type';
	const FIELD_VALUE = 'value';
	const FIELD_REQUIRED = 'required';

	const TYPE_STRING = 'string';
	const TYPE_URL = 'url';
	const TYPE_INT = 'int';
	const TYPE_FLOAT = 'float';
	const TYPE_DATE_DIFF = 'date_diff';
	const TYPE_SELECT = 'select';
	const TYPE_PASSWORD = 'password';
	const TYPE_MAPPING = 'mapping';
	const TYPE_PERIOD = 'period';


	public function getType();

	public function setValue($value);

	public function getValue();

	public function validate($value): bool;

	public function getRequired() : bool;
}