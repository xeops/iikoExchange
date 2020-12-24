<?php


namespace iikoExchangeBundle\ExtensionTrait;

/**
 * Trait ExchangeNodeTrait
 * @package iikoExchangeBundle\ExtensionTrait
 * @depends ExchangeNodeInterface
 */
trait ExchangeNodeTrait
{

	protected string $code;
	protected string $name;
	protected string $description;


	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description ?? $this->getCode();
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name ?? $this->getCode();
	}


	public function jsonSerialize()
	{
		return [
			self::FIELD_CODE => $this->getCode(),
			self::FIELD_NAME => $this->getName(),
			self::FIELD_DESCRIPTION => $this->getDescription(),
		];
	}

	public function getChildNodes() : array
	{
		return [];
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @param string $description
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}



}