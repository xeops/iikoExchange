<?php

namespace iikoExchangeBundle\Exception;

use iikoExchangeBundle\Contract\Exception\ExchangeExceptionInterface;
use Throwable;

class StartUpParameterNotFound extends BaseExchangeException
{
	const ERROR_CODE = 'START_UP_PARAMETER_NOT_FOUND';

	public function __construct($message = self::ERROR_CODE, $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}

	public function setMessage($message): void
	{
		// TODO: Implement setMessage() method.
	}
}