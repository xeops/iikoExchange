<?php

namespace iikoExchangeBundle\Exception;

use Throwable;

class StartUpParameterNotFound extends ExchangeException
{
	const ERROR_CODE = 'START_UP_PARAMETER_NOT_FOUND';

	public function __construct($message = self::ERROR_CODE, $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}