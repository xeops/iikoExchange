<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Library\Provider\Provider;

abstract class AbstractExchangeBuilder implements ExchangeNodeInterface
{

	protected string $unique;

	const FIELD_EXTRACTOR = 'extractor';
	const FIELD_PROVIDER = 'provider';
	const FIELD_LOADER = 'loader';
	const FIELD_ENGINES = 'engines';
	const FIELD_SCHEDULES = 'schedules';
	const FIELD_MAPPING = 'mapping';

	protected Provider $extractor;
	protected Provider $loader;
	/** @var ExchangeEngine[] */
	protected array $engines;
	protected array $schedules;

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}

	public function __construct(string $code)
	{
		$this->code = $code;
		$this->unique = md5(mt_rand() . $code);
	}


	public function jsonSerialize()
	{
		$requests = $mappings = [];

		array_map(function (ExchangeEngine $engine) use (&$requests, &$mappings)
		{
			foreach ($engine->getRequests() as $request)
			{
				$requests[$request->getCode()] = $request->jsonSerialize();
			}
			foreach ($engine->getTransformer()->getMappings() as $mapping)
			{
				$mappings[$mapping->getCode()] = $mapping;
			}
		}, $this->getEngines());


		return $this->nodeJsonSerialize() + [

				static::FIELD_EXTRACTOR => [self::FIELD_PROVIDER => $this->getExtractor()] + [ExchangeEngine::FIELD_REQUEST => array_values($requests)],
				static::FIELD_LOADER => $this->getLoader(),
				static::FIELD_ENGINES => $this->getEngines(),
				static::FIELD_MAPPING => array_values($mappings),
				static::FIELD_SCHEDULES => $this->getSchedules()
			];
	}

	/**
	 * @return Provider
	 */
	public function getExtractor(): Provider
	{
		return $this->extractor;
	}

	/**
	 * @param Provider $extractor
	 * @return AbstractExchangeBuilder
	 */
	public function setExtractor(Provider $extractor): AbstractExchangeBuilder
	{
		$this->extractor = $extractor;
		return $this;
	}

	/**
	 * @return Provider
	 */
	public function getLoader(): Provider
	{
		return $this->loader;
	}

	/**
	 * @param Provider $loader
	 * @return AbstractExchangeBuilder
	 */
	public function setLoader(Provider $loader): AbstractExchangeBuilder
	{
		$this->loader = $loader;
		return $this;
	}

	/**
	 * @return ExchangeEngine[]
	 */
	public function getEngines(): array
	{
		return $this->engines;
	}

	/**
	 * @param array $engines
	 * @return AbstractExchangeBuilder
	 */
	public function setEngines(array $engines): AbstractExchangeBuilder
	{
		$this->engines = $engines;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getSchedules(): array
	{
		return $this->schedules;
	}

	/**
	 * @param array $schedules
	 * @return AbstractExchangeBuilder
	 */
	public function setSchedules(array $schedules): AbstractExchangeBuilder
	{
		$this->schedules = $schedules;
		return $this;
	}

	public function getChildNodes(): array
	{
		return array_merge($this->getSchedules() , $this->getEngines() , [$this->getLoader(), $this->getExtractor()]);
	}

}