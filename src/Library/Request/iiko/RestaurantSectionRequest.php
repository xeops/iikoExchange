<?php

namespace iikoExchangeBundle\Library\Request\iiko;

use iikoExchangeBundle\Contract\Request\IikoRequestInterface;

class RestaurantSectionRequest implements IikoRequestInterface
{

	public function getPath(): string
	{
		return '/resto/api/products/restaurantSection';
	}

	public function getMethod(): string
	{
		return 'GET';
	}

	public function getQuery(): string
	{
		return '';
	}

	public function getBody(): array
	{
		return [];
	}

	public function getHeaders(): array
	{
		return [];
	}

	public function processResponse($data)
	{
		return $data;
	}
}