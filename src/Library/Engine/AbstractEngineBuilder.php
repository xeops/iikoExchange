<?php


namespace iikoExchangeBundle\Engine;


use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\ExtractorInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\ExtensionTrait\ConfigurableExtensionTrait;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Format\Formatter;
use iikoExchangeBundle\Library\Transform\AbstractTransformer;

abstract class AbstractEngineBuilder implements ExchangeEngineInterface, ConfigurableExtensionInterface
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

	/** @var ExchangeRequestInterface[] */
	protected array $requests = [];
	protected AbstractTransformer $transformer;
	protected Formatter $formatter;
	protected $loader = null;
	protected $extractor = null;

	protected ?bool $enabled = null;

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
	 * @param ExchangeRequestInterface[] $requests
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
	 * @return ExchangeRequestInterface[]
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

	public function getChildNodes(): array
	{
		$result = array_merge($this->getRequests(), [$this->getFormatter(), $this->getTransformer()]);
		if ($this->getLoader())
		{
			$result[] = $this->getLoader();
		}
		if ($this->getExtractor())
		{
			$result[] = $this->getExtractor();
		}
		return $result;
	}

	/**
	 * @return ConnectionInterface|null|StorageInterface
	 */
	public function getLoader()
	{
		return $this->loader;
	}

	/**
	 * @param ConnectionInterface|StorageInterface $loader
	 * @return ExchangeInterface
	 */
	public function setLoader($loader): ExchangeEngineInterface
	{
		$this->loader = $loader;
		return $this;
	}

	/**
	 * @return ConnectionInterface|null|ExtractorInterface
	 */
	public function getExtractor()
	{
		return $this->extractor;
	}

	/**
	 * @param ConnectionInterface|ExtractorInterface $extractor
	 * @return AbstractEngineBuilder
	 */
	public function setExtractor($extractor)
	{
		$this->extractor = $extractor;
		return $this;
	}

	public function getEnabled(): ?bool
	{
		return $this->enabled;
	}

	public function setEnabled(?bool $enabled): AbstractEngineBuilder
	{
		$this->enabled = $enabled;
		return $this;
	}



}