<?php


namespace iikoExchangeBundle\Contract\Exchange;


use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\Engine\ExchangeEngineInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\iikoStorage\ExtractorInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
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
	const FIELD_GLOBAL_CONFIG = 'configuration';
	const FIELD_REQUESTS = 'requests';


	/**
	 * @return Connection|ExtractorInterface
	 */
	public function getExtractor();

	/**
	 * @param Connection|ExtractorInterface $extractor
	 * @return ExchangeInterface
	 */
	public function setExtractor($extractor): ExchangeInterface;

	/**
	 * @return ConnectionInterface|StorageInterface
	 */
	public function getLoader();

	/**
	 * @param ConnectionInterface|StorageInterface $loader
	 * @return ExchangeInterface
	 */
	public function setLoader($loader): ExchangeInterface;

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