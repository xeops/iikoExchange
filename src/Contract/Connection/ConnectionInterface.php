<?php

namespace iikoExchangeBundle\Contract\Connection;

use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;

interface ConnectionInterface extends ConfigurableExtensionInterface
{
	public function sendRequest($request): Response;

	public function getType(): string;

	public function getCode(): string;
}