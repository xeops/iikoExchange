<?php


namespace iikoExchangeBundle\Contract\Extensions;


interface ConfigurableExtensionInterface
{
	const FIELD_CONFIGURATION = 'configuration';

	public function exposeConfiguration(): array;

	public function setConfigCollection(array $config);
}