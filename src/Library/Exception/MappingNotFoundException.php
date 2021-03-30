<?php


namespace iikoExchangeBundle\Exception;


use iikoExchangeBundle\Contract\Exception\ExchangeExceptionInterface;

class MappingNotFoundException extends \Exception implements ExchangeExceptionInterface
{

	protected array $identifiers;
	protected string $mappingCode;

	protected $message;

	const MESSAGE = 'MAPPING_NOT_FOUND';

	public function __construct(string $mappingCode, array $identifiers)
	{
		$this->identifiers = $identifiers;
		$this->mappingCode = $mappingCode;

		parent::__construct(self::MESSAGE, 500);
	}

	/**
	 * @return array
	 */
	public function getIdentifiers(): array
	{
		return $this->identifiers;
	}

	/**
	 * @return string
	 */
	public function getMappingCode(): string
	{
		return $this->mappingCode;
	}


	/**
	 * @param mixed $message
	 */
	public function setMessage($message): void
	{
		$this->message = $message;
	}

}