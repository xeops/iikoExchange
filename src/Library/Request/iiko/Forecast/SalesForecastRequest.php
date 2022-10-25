<?php

namespace iikoExchangeBundle\Library\Request\iiko\Forecast;

use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

class SalesForecastRequest implements ExchangeRequestInterface
{
	const CODE = 'SALES_FORECAST_REQUEST';

	public function __construct()
	{
		$this->code = self::CODE;
	}

	use ExchangeNodeTrait;

}