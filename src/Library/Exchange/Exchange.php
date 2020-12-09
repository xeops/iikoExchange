<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;

use iikoExchangeBundle\Engine\Engine;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Library\Provider\Provider;
use iikoExchangeBundle\Library\Schedule\ScheduleCron;

class Exchange implements ExchangeNodeInterface
{

	const FIELD_EXTRACTOR = 'extractor';
	const FIELD_PROVIDER = 'provider';
	const FIELD_LOADER = 'loader';
	const FIELD_ENGINES = 'engines';
	const FIELD_SCHEDULES = 'schedules';

	protected Provider $extractor;
	protected Provider $loader;
	/** @var Engine[] */
	protected array $engines;
	protected array $schedules;

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function jsonSerialize()
	{
		$requests = [];
		array_map(function (Engine $engine) use (&$requests)
		{
			foreach ($engine->getRequests() as $request)
			{
				$requests[$request->getCode()] = $request->jsonSerialize();
			}
		}, $this->getEngines());

		return $this->nodeJsonSerialize() + [

			static::FIELD_EXTRACTOR => [self::FIELD_PROVIDER => $this->getExtractor()] + [Engine::FIELD_REQUEST => array_values($requests)],
			static::FIELD_LOADER => $this->getLoader(),
			static::FIELD_ENGINES => $this->getEngines(),
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
	 * @return Exchange
	 */
	public function setExtractor(Provider $extractor): Exchange
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
	 * @return Exchange
	 */
	public function setLoader(Provider $loader): Exchange
	{
		$this->loader = $loader;
		return $this;
	}

	/**
	 * @return Engine[]
	 */
	public function getEngines(): array
	{
		return $this->engines;
	}

	/**
	 * @param array $engines
	 * @return Exchange
	 */
	public function setEngines(array $engines): Exchange
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
	 * @return Exchange
	 */
	public function setSchedules(array $schedules): Exchange
	{
		$this->schedules = $schedules;
		return $this;
	}


}