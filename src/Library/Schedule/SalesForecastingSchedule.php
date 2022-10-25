<?php

namespace iikoExchangeBundle\Library\Schedule;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

class SalesForecastingSchedule implements ExchangeNodeInterface
{
	const CODE = 'EXCHANGE.SCHEDULE.FORECAST';

	public function getCode(): string
	{
		return self::CODE;
	}

	use ExchangeNodeTrait;
}