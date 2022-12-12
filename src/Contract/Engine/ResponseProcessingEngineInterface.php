<?php

namespace iikoExchangeBundle\Contract\Engine;

use GuzzleHttp\Psr7\Response;

interface ResponseProcessingEngineInterface
{
	public function processResponse(Response $response): void;
}