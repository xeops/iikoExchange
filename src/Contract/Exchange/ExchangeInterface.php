<?php


namespace iikoExchangeBundle\Contract\Exchange;


use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\Library\Schedule\ScheduleCron;

interface ExchangeInterface extends ExchangeNodeInterface
{
	const EXECUTION_SCHEDULE = 'schedule';
	const EXECUTION_MANUAL = 'schedule';
	const EXECUTION_PREVIEW = 'schedule';


	const FIELD_ID = 'id';
	const FIELD_UNIQUE = 'unique';


	public function getUniq(): string;

	/**
	 * @return int|null
	 */
	public function getId();

	public function setId(int $id);

	public function setUniq(string $uniq) : ExchangeInterface;

	const FIELD_PREVIEW = 'preview';
	const FIELD_INTERVAL = 'interval';
	const FIELD_EXTRACTOR = 'extractor';
	const FIELD_LOADER = 'loader';
	const FIELD_ENGINES = 'engines';
	const FIELD_SCHEDULES = 'schedules';
	const FIELD_MAPPING = 'mapping';
	const FIELD_REQUESTS = 'requests';


	/**
	 * @return Connection
	 */
	public function getExtractor(): Connection;

	/**
	 * @param Connection $extractor
	 * @return ExchangeInterface
	 */
	public function setExtractor(Connection $extractor): ExchangeInterface;

	/**
	 * @return Connection
	 */
	public function getLoader(): Connection;

	/**
	 * @param Connection $loader
	 * @return ExchangeInterface
	 */
	public function setLoader(Connection $loader): ExchangeInterface;

	/**
	 * @return ExchangeEngine[]
	 */
	public function getEngines(): array;

	/**
	 * @return ExchangeRequestInterface[]
	 */
	public function getRequests(): array;

	/**
	 * @param ExchangeEngineInterface[] $engines
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

	public function getPreviewTemplate(): ?string;

	public function setPreviewTemplate(string $template): ExchangeInterface;

	public function setLocale(string $locale): ExchangeInterface;

	public function getLocale(): string;
}