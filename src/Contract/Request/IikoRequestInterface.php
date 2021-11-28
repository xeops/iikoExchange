<?php

namespace iikoExchangeBundle\Contract\Request;

interface IikoRequestInterface extends ExchangeRequestInterface
{
	public function getPath(): string;

	public function getMethod(): string;

	public function getQuery(): string;

	public function getBody(): array;

	public function getHeaders(): array;

	public function processResponse($data);
}