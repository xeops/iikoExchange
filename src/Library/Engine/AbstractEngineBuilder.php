<?php


namespace iikoExchangeBundle\Engine;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Format\Formatter;
use iikoExchangeBundle\Library\Request\DataSourceRequest;
use iikoExchangeBundle\Library\Transform\AbstractTransformer;

abstract class AbstractEngineBuilder implements ExchangeNodeInterface, ConfigurableExtensionInterface
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

	/** @var DataSourceRequest[] */
	protected array $requests;
	protected AbstractTransformer $transformer;
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
	 * @param DataSourceRequest[] $requests
	 * @return AbstractEngineBuilder
	 */
	public function setRequests(array $requests): AbstractEngineBuilder
	{
		$this->requests = $requests;
		return $this;
	}

	/**
	 * @param AbstractTransformer $transformer
	 * @return AbstractEngineBuilder
	 */
	public function setTransformer(AbstractTransformer $transformer): AbstractEngineBuilder
	{
		$this->transformer = $transformer;
		return $this;
	}

	/**
	 * @param Formatter $formatter
	 * @return AbstractEngineBuilder
	 */
	public function setFormatter(Formatter $formatter): AbstractEngineBuilder
	{
		$this->formatter = $formatter;
		return $this;
	}


	/**
	 * @return DataSourceRequest[]
	 */
	public function getRequests(): array
	{
		return $this->requests;
	}

	/**
	 * @return AbstractTransformer
	 */
	public function getTransformer(): AbstractTransformer
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