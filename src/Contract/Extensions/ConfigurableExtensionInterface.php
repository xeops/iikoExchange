<?php


namespace iikoExchange\Contract\Extensions;


interface ConfigurableExtensionInterface
{
	const FIELD_CONFIGURATION = 'configuration';

	public function exposeConfiguration(): array;
}