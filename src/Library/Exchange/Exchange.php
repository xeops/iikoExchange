<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;

use iikoExchangeBundle\Engine\Engine;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Library\Provider\Provider;

class Exchange implements ExchangeNodeInterface
{

	const FIELD_EXTRACTOR = 'extractor';
	const FIELD_LOADER = 'loader';
	const FIELD_ENGINES = 'engines';

	protected Provider $extractor;
	protected Provider $loader;
	/** @var Engine[] */
	protected array $engines;

	use ExchangeNodeTrait;

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function jsonSerialize()
	{
		$requests = [];
		array_map(function (Engine $engine) use ($requests)
		{
			foreach ($engine->getRequests() as $request)
			{
				$requests[$request->getCode()] = $request;
			}
		}, $this->getEngines());

		return [
			self::FIELD_CODE => $this->getCode(),
			self::FIELD_EXTRACTOR => $this->getExtractor() + [Engine::FIELD_REQUEST => $requests],
			self::FIELD_LOADER => $this->getLoader(),
			self::FIELD_ENGINES => $this->getEngines()
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


}