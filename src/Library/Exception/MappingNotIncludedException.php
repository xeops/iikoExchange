<?php


namespace iikoExchangeBundle\Exception;


class MappingNotIncludedException extends ExchangeException
{

	protected array $identifiers;
	protected string $mappingCode;

	const MESSAGE = 'MAPPING_NOT_INCLUDED';

	public function __construct(string $mappingCode)
	{
		$this->mappingCode = $mappingCode;

		parent::__construct(self::MESSAGE, 500);
	}


	/**
	 * @return string
	 */
	public function getMappingCode(): string
	{
		return $this->mappingCode;
	}



}