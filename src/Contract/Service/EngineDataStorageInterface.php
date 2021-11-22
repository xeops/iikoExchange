<?php

namespace iikoExchangeBundle\Contract\Service;

use iikoExchangeBundle\Exchange\Exchange;
use iikoExchangeBundle\Library\Request\DataSourceRequest;

interface EngineDataStorageInterface
{
	public function saveData(Exchange $exchange, DataSourceRequest $request, $data) : void;

	public function getData(Exchange $exchange, DataSourceRequest $request);

	public function existData(Exchange $exchange, DataSourceRequest $request): bool;

}