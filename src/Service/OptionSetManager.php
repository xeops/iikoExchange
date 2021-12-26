<?php

namespace iikoExchangeBundle\Service;

use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Extensions\ConfigurableExtensionInterface;
use iikoExchangeBundle\Contract\Service\ExchangeConfigStorageInterface;
use iikoExchangeBundle\ExtensionHelper\WithConfigExtensionHelper;
use Psr\Log\LoggerInterface;

class OptionSetManager
{
	private LoggerInterface $logger;
	private ExchangeConfigStorageInterface $configStorage;
	private OptionSetDirectory $optionSetDirectory;

	public function __construct(LoggerInterface $logger, ExchangeConfigStorageInterface $configStorage, OptionSetDirectory $optionSetDirectory)
	{
		$this->logger = $logger;
		$this->configStorage = $configStorage;
		$this->optionSetDirectory = $optionSetDirectory;
	}

	public function getOptionSet(string $optionSetCode, ExchangeInterface $exchange, ?Restaurant $restaurant = null): array
	{
		$optionSetService = $this->optionSetDirectory->get($optionSetCode);
		/** @var ExchangeNodeInterface|ConfigurableExtensionInterface|ConnectionInterface $connection */
		$connection = $optionSetService->getConnection();

		$connection->setConfigCollection($this->configStorage->getConfiguration($exchange, $connection, $restaurant));

		$rawData = $connection->sendRequest($optionSetService->getRequest());


		return $rawData->getStatusCode() === 200 ? $optionSetService->processResponse($rawData->getBody()->__toString()) : [];


	}
}