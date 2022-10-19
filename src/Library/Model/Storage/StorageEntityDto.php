<?php

namespace iikoExchangeBundle\Library\Model\Storage;

use iikoExchangeBundle\Contract\iikoStorage\StorageEntityInterface;

class StorageEntityDto implements StorageEntityInterface
{

	private string $externalUniq;
	private array $data;
	private array $extraData;

	public function __construct(string $externalUniq, array $data, array $extraData = [])
	{
		$this->externalUniq = $externalUniq;
		$this->data = $data;
		$this->extraData = $extraData;
	}

	/**
	 * @return string
	 */
	public function getExternalUniq(): string
	{
		return $this->externalUniq;
	}

	/**
	 * @param string $externalUniq
	 * @return StorageEntityDto
	 */
	public function setExternalUniq(string $externalUniq): StorageEntityDto
	{
		$this->externalUniq = $externalUniq;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @param \JsonSerializable $data
	 * @return StorageEntityDto
	 */
	public function setData(array $data): StorageEntityDto
	{
		$this->data = $data;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getExtraData(): array
	{
		return $this->extraData;
	}

	/**
	 * @param array $extraData
	 * @return StorageEntityDto
	 */
	public function setExtraData(array $extraData): StorageEntityDto
	{
		$this->extraData = $extraData;
		return $this;
	}




}