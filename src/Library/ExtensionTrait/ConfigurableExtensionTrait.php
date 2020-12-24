<?php


namespace iikoExchangeBundle\ExtensionTrait;


trait ConfigurableExtensionTrait
{
	protected array $config;

	protected ?array $exposedConfig = null;

	public function getConfiguration(): array
	{
		if (null === $this->exposedConfig)
		{
			$this->exposedConfig = $this->exposeConfiguration();
		}
		return $this->exposedConfig;
	}

	public function exposeConfiguration(): array
	{
		return [

		];
	}

	public function jsonSerialize()
	{
		return [
			self::FIELD_CONFIGURATION => $this->getConfiguration()
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