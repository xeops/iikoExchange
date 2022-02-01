<?php

namespace iikoExchangeBundle\Contract\Service;

use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface PreviewStorageInterface
{
	public function saveData(ExchangeInterface $exchange, ExchangeEngineInterface $exchangeEngine, $data): void;

	public function getData(ExchangeInterface $exchange);

	public function existData(ExchangeInterface $exchange): bool;

	public function clearData(ExchangeInterface $exchange);

	public function error(ExchangeInterface $exchange, $error);

	public function isError(ExchangeInterface $exchange): bool;

	public function getError(ExchangeInterface $exchange): ?string;
}