<?php


namespace iikoExchangeBundle\Engine;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Format\Formatter;
use iikoExchangeBundle\Library\Request\Request;
use iikoExchangeBundle\Library\Transform\Transformer;

class Engine implements ExchangeNodeInterface, ConfigurableExtensionInterface
{
	const FIELD_REQUEST = 'requests';
	const FIELD_TRANSFORMER = 'transformer';
	const FIELD_FORMATTER = 'formatter';

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}
	use ConfigurableExtensionTrait
	{
		ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
	}

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
		return
			$this->nodeJsonSerialize() +
			$this->configJsonSerialize() +
			[
				self::FIELD_TRANSFORMER => $this->getTransformer(),
				self::FIELD_FORMATTER => $this->getFormatter()
			];
	}

	/**
	 * @param Request[] $requests
	 * @return Engine
	 */
	public function setRequests(array $requests): Engine
	{
		$this->requests = $requests;
		return $this;
	}

	/**
	 * @param Transformer $transformer
	 * @return Engine
	 */
	public function setTransformer(Transformer $transformer): Engine
	{
		$this->transformer = $transformer;
		return $this;
	}

	/**
	 * @param Formatter $formatter
	 * @return Engine
	 */
	public function setFormatter(Formatter $formatter): Engine
	{
		$this->formatter = $formatter;
		return $this;
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