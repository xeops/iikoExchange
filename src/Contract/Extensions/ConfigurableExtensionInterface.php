<?php


namespace iikoExchangeBundle\Contract\Extensions;


use iikoExchangeBundle\Contract\Configuration\ConfigType\ConfigItemInterface;

interface ConfigurableExtensionInterface
{
	const FIELD_CONFIGURATION = 'configuration';

	/**
	 * @return ConfigItemInterface[]
	 */
	public function exposeConfiguration(): array;

	public function setConfigCollection(array $config);
}