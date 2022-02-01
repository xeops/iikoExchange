<?php


namespace iikoExchangeBundle\Contract;


interface ExchangeNodeInterface extends \JsonSerializable #\\TODO \Serializable
{
	const FIELD_CODE = 'code';
	const FIELD_NAME = 'name';
	const FIELD_DESCRIPTION = 'description';

	public function getCode(): string;

	public function getChildNodes(): array;

	public function setName(string $name) : ExchangeNodeInterface;

	public function setDescription(string $description);

	public function getName();

	public function getDescription();
}