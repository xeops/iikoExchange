<?php


namespace iikoExchangeBundle\Exception;


class ConfigNotFoundException extends ExchangeException
{
	private string $configCode;
	protected  $message;

	const MESSAGE = 'CONFIG_NOT_FOUND';

	public function __construct(string $configCode)
	{
		$this->configCode = $configCode;
		parent::__construct(self::MESSAGE, 500);
	}

	/**
	 * @return string
	 */
	public function getConfigCode(): string
	{
		return $this->configCode;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage($message): void
	{
		$this->message = $message;
	}


}