<?php


namespace iikoExchangeBundle\Exchange;


use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\WithMappingExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithMultiRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithPeriodExtensionInterface;
use iikoExchangeBundle\Contract\Extensions\WithRestaurantExtensionInterface;
use iikoExchangeBundle\Contract\iikoStorage\StorageInterface;
use iikoExchangeBundle\Engine\ExchangeEngine;
use iikoExchangeBundle\ExtensionHelper\PeriodicalExtensionHelper;
use iikoExchangeBundle\ExtensionHelper\WithRestaurantExtensionHelper;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;
use iikoExchangeBundle\Library\Schedule\ScheduleCron;

abstract class AbstractExchangeBuilder implements ExchangeInterface
{
	protected string $locale = 'ru_RU';

	public function __clone()
	{
		$this->generateUniq();
		$this->loader = clone $this->loader;
		$this->extractor = clone $this->extractor;

		foreach ($this->engines as $key => $engine)
		{
			$this->engines[$key] = clone $engine;
		}
	}

	protected function generateUniq()
	{
		$this->uniq = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
	}

	protected ?int $moduleId = null;

	protected ?int $id = null;

	protected ?string $uniq = null;

	protected ?string $previewTemplate = null;

	/**
	 * @return string
	 */
	public function getUniq(): string
	{
		if (!$this->uniq)
		{
			$this->generateUniq();
		}
		return $this->uniq;
	}


	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	public function setId(?int $id)
	{
		$this->id = $id;
		return $this;
	}

	public function setUniq(string $uniq): ExchangeInterface
	{
		$this->uniq = $uniq;
		return $this;
	}


	protected Connection $extractor;
	/** @var ConnectionInterface|StorageInterface */
	protected $loader;
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
	}


	public function jsonSerialize()
	{
		$requests = $mappings = [];

		array_map(function (ExchangeEngine $engine) use (&$requests)
		{
			foreach ($engine->getRequests() as $request)
			{
				$requests[$request->getCode()] = $request->jsonSerialize();
			}

		}, $this->getEngines());

		$this->serialiseMappingExtension($this, $mappings);

		return $this->nodeJsonSerialize() + [

				static::FIELD_EXTRACTOR => $this->getExtractor(),
				static::FIELD_REQUESTS => array_values($requests),
				static::FIELD_LOADER => $this->getLoader(),
				static::FIELD_ENGINES => $this->getEngines(),
				static::FIELD_MAPPING => array_values($mappings),
				static::FIELD_SCHEDULES => $this->getSchedules(),
				static::FIELD_PREVIEW => $this->previewTemplate !== null,
				WithPeriodExtensionInterface::FIELD_PERIOD => PeriodicalExtensionHelper::isNeedPeriod($this),
				WithRestaurantExtensionInterface::FIELD_RESTAURANT => WithRestaurantExtensionHelper::isNeedRestaurant($this),
				WithMultiRestaurantExtensionInterface::FIELD_BY_MULTI_STORE => WithRestaurantExtensionHelper::isNeedMultiRestaurant($this)
			];
	}

	protected function serialiseMappingExtension(ExchangeNodeInterface $exchangeNode, array &$mappings)
	{
		if ($exchangeNode instanceof WithMappingExtensionInterface)
		{
			foreach ($exchangeNode->getMapping() as $mapping)
			{
				$mappings[$mapping->getCode()] = $mapping;
			}
		}
		foreach ($exchangeNode->getChildNodes() as $childNode)
		{
			$this->serialiseMappingExtension($childNode, $mappings);
		}
	}

	/**
	 * @return Connection
	 */
	public function getExtractor(): Connection
	{
		return $this->extractor;
	}

	/**
	 * @param Connection $extractor
	 * @return ExchangeInterface
	 */
	public function setExtractor(ConnectionInterface $extractor): ExchangeInterface
	{
		$this->extractor = $extractor;
		return $this;
	}

	/**
	 * @return ConnectionInterface|StorageInterface
	 */
	public function getLoader()
	{
		return $this->loader;
	}

	/**
	 * @param ConnectionInterface|StorageInterface $loader
	 * @return ExchangeInterface
	 */
	public function setLoader($loader): ExchangeInterface
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

	public final function getRequests(): array
	{
		$result = [];
		foreach ($this->getEngines() as $engine)
		{
			foreach ($engine->getRequests() as $request)
			{
				$result[$request->getCode()] = $request;
			}
		}
		return $result;
	}

	/**
	 * @param array $engines
	 * @return ExchangeInterface
	 */
	public function setEngines(array $engines): ExchangeInterface
	{
		$this->engines = $engines;
		return $this;
	}

	/**
	 * @return ScheduleCron[]
	 */
	public function getSchedules(): array
	{
		return $this->schedules;
	}

	/**
	 * @param array $schedules
	 * @return ExchangeInterface
	 */
	public function setSchedules(array $schedules): ExchangeInterface
	{
		$this->schedules = $schedules;
		return $this;
	}

	public function getChildNodes(): array
	{
		return array_merge($this->getSchedules(), $this->getEngines(), [$this->getLoader(), $this->getExtractor()]);
	}

	/**
	 * @param int|null $moduleId
	 */
	public function setModuleId(?int $moduleId): void
	{
		$this->moduleId = $moduleId;
	}

	/**
	 * @return int|null
	 */
	public function getModuleId(): ?int
	{
		return $this->moduleId;
	}

	/**
	 * @return string|null
	 */
	public function getPreviewTemplate(): ?string
	{
		return $this->previewTemplate;
	}

	/**
	 * @param string|null $previewTemplate
	 * @return AbstractExchangeBuilder
	 */
	public function setPreviewTemplate(?string $previewTemplate): AbstractExchangeBuilder
	{
		$this->previewTemplate = $previewTemplate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLocale(): string
	{
		return $this->locale;
	}

	/**
	 * @param string $locale
	 * @return AbstractExchangeBuilder
	 */
	public function setLocale(string $locale): AbstractExchangeBuilder
	{
		$this->locale = $locale;
		return $this;
	}


}