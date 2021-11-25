<?php

namespace iikoExchangeBundle\Service\Storage;

use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\Service\PreviewStorageInterface;

class DummyPreviewStorage implements PreviewStorageInterface
{
	protected array $storage = [];
	protected array $errorList = [];

	public function saveData(ExchangeInterface $exchange, ExchangeEngineInterface $exchangeEngine, $data): void
	{
		$this->storage[$exchange->getUniq()] = $this->storage[$exchange->getUniq()] ?? [];
		$this->storage[$exchange->getUniq()][$exchangeEngine->getCode()] = $data;
	}

	public function getData(ExchangeInterface $exchange)
	{
		return $this->storage[$exchange->getUniq()] ?? null;
	}

	public function existData(ExchangeInterface $exchange): bool
	{
		return array_key_exists($exchange->getUniq(), $this->storage);
	}

	public function clearData(ExchangeInterface $exchange)
	{
		unset($this->storage[$exchange->getUniq()]);
	}

	public function isError(ExchangeInterface $exchange): bool
	{
		return array_key_exists($exchange->getUniq(), $this->errorList) && !is_null($this->errorList[$exchange->getUniq()]);
	}

	public function getError(ExchangeInterface $exchange): ?string
	{
		return $this->errorList[$exchange->getUniq()] ?? null;
	}

	public function error(ExchangeInterface $exchange, $error)
	{
		$this->errorList[$exchange->getUniq()] = $error;
	}
}