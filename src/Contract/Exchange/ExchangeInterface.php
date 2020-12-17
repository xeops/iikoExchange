<?php


namespace iikoExchangeBundle\Contract\Exchange;


use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Exchange\Event\ExchangeErrorEvent;
use iikoExchangeBundle\Exchange\Event\ExchangeProcessEvent;
use iikoExchangeBundle\Library\Provider\Provider;
use iikoExchangeBundle\Library\Schedule\ScheduleCron;

interface ExchangeInterface extends ExchangeNodeInterface
{
	const FIELD_ID = 'id';
	const FIELD_UNIQUE = 'unique';


	public function getUniq(): string;


	public function setUniq(string $uniq);

	/**
	 * @return $this
	 */
	public function generateUniq();

	/**
	 * @return int|null
	 */
	public function getId();

	public function setId(int $id);


	const FIELD_EXTRACTOR = 'extractor';
	const FIELD_PROVIDER = 'provider';
	const FIELD_LOADER = 'loader';
	const FIELD_ENGINES = 'engines';
	const FIELD_SCHEDULES = 'schedules';
	const FIELD_MAPPING = 'mapping';


	/**
	 * @return Provider
	 */
	public function getExtractor(): Provider;

	/**
	 * @param Provider $extractor
	 * @return ExchangeInterface
	 */
	public function setExtractor(Provider $extractor): ExchangeInterface;

	/**
	 * @return Provider
	 */
	public function getLoader(): Provider;

	/**
	 * @param Provider $loader
	 * @return ExchangeInterface
	 */
	public function setLoader(Provider $loader): ExchangeInterface;

	/**
	 * @return ExchangeEngine[]
	 */
	public function getEngines(): array;

	/**
	 * @param array $engines
	 * @return ExchangeInterface
	 */
	public function setEngines(array $engines): ExchangeInterface;

	/**
	 * @return ScheduleCron[]
	 */
	public function getSchedules(): array;

	/**
	 * @param array $schedules
	 * @return ExchangeInterface
	 */
	public function setSchedules(array $schedules): ExchangeInterface;

	public function getChildNodes(): array;

	public function process();

	public function error(\Exception $exception);
}