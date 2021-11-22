<?php

namespace iikoExchangeBundle\Contract\Request;

interface OAuth2RequestInterface extends ExchangeRequestInterface
{
	public function getPath(): string;

	public function getMethodType(): string;

	public function getHeaders(): array;

	public function getQuery(): array;

	public function getBody(): array;

	public function processResponse($response);
}