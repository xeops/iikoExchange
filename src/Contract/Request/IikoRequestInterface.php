<?php

namespace iikoExchangeBundle\Contract\Request;

interface IikoRequestInterface
{
	public function getPath() : string;

	public function getMethod() : string;

	public function getQuery() : string;

	public function getBody() : string;

	public function getHeaders() : array;

}