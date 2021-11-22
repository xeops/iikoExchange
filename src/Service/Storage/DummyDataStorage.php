<?php

namespace iikoExchangeBundle\Service\Storage;

use iikoExchangeBundle\Contract\Service\EngineDataStorageInterface;
use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Request\DataSourceRequest;

class DummyDataStorage implements EngineDataStorageInterface
{
	protected array $storage = [];

	public function saveData(Exchange $exchange, DataSourceRequest $request, $data): void
	{
		$this->storage[$exchange->getUniq()] = $this->storage[$exchange->getUniq()] ?? [];
		$this->storage[$exchange->getUniq()][$request->getCode()] = $data;
	}

	public function getData(Exchange $exchange, DataSourceRequest $request)
	{
		return $this->storage[$exchange->getUniq()] ? ($this->storage[$exchange->getUniq()][$request->getCode()] ?? null) : null;
	}

	public function existData(Exchange $exchange, DataSourceRequest $request): bool
	{
		return array_key_exists($exchange->getUniq(), $this->storage) && array_key_exists($request->getCode(), $this->storage[$exchange->getUniq()]);
	}
}