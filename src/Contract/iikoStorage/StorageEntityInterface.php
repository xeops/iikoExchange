<?php

namespace iikoExchangeBundle\Contract\iikoStorage;

interface StorageEntityInterface
{
	public function __construct(string $externalUniq, array $data);

	public function getExternalUniq(): string;

	public function getData(): array;

	public function getExtraData(): array;
}