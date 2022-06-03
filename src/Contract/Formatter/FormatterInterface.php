<?php

namespace iikoExchangeBundle\Contract\Formatter;

use iikoExchangeBundle\Exchange\Exchange;

interface FormatterInterface
{
	public function getFormattedData(Exchange $exchange, $data);
}