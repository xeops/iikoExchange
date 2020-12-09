<?php


namespace iikoExchangeBundle\ExtensionTrait;


trait ConfigurableExtensionTrait
{
	public function exposeConfiguration(): array
	{
		return [

		];
	}

	public function jsonSerialize()
	{
		return [
			self::FIELD_CONFIGURATION => $this->exposeConfiguration()
		];
	}
}