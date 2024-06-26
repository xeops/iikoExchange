<?php


namespace iikoExchangeBundle\Contract\Extensions;


use iikoExchangeBundle\Contract\Configuration\ConfigType\ConfigItemInterface;

interface ConfigurableExtensionInterface
{
	const FIELD_CONFIGURATION = 'configuration';

	public function getConfiguration() : array;

	public function getGlobalConfiguration() : array;
	/**
	 * @return ConfigItemInterface[]
	 */
	public function exposeConfiguration(): array;

	public function setConfigCollection(array $config);
	/**
	 * @return ConfigItemInterface[]
	 */
	public function exposeGlobalConfiguration(): array;

	public function getConfigValue(string $configCode, bool $save = false);
}