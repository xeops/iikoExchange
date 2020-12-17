<?php


namespace iikoExchangeBundle\ExtensionTrait;


trait ConfigurableExtensionTrait
{
	protected array $config;

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

	public function setConfigCollection(array $config)
	{
		$this->config = $config;
	}

	protected function getConfigValue(string $configCode)
	{
		if (!array_key_exists($configCode, $this->config))
		{
			throw new \Exception("CONFIG NOT FOUND {$configCode}");
		}
		return $this->config[$configCode];
	}
}