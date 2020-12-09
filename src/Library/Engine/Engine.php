<?php


namespace iikoExchange\Engine;


use iikoExchange\Contract\ExchangeNodeInterface;
use iikoExchange\ExtensionTrait\ExchangeNodeTrait;
use iikoExchange\Format\Formatter;
use iikoExchange\Library\Request\Request;
use iikoExchange\Library\Transform\Transformer;

class Engine implements ExchangeNodeInterface
{
	const FIELD_REQUEST = 'requests';
	const FIELD_TRANSFORMER = 'transformer';
	const FIELD_FORMATTER = 'formatter';

	use ExchangeNodeTrait;

	/** @var Request[] */
	protected array $requests;
	protected Transformer $transformer;
	protected Formatter $formatter;

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function jsonSerialize()
	{
		return [
			self::FIELD_CODE => $this->getCode(),
			self::FIELD_TRANSFORMER => $this->getTransformer(),
			self::FIELD_FORMATTER => $this->getFormatter()
		];
	}

	/**
	 * @return Request[]
	 */
	public function getRequests(): array
	{
		return $this->requests;
	}

	/**
	 * @return Transformer
	 */
	public function getTransformer(): Transformer
	{
		return $this->transformer;
	}

	/**
	 * @return Formatter
	 */
	public function getFormatter(): Formatter
	{
		return $this->formatter;
	}

}