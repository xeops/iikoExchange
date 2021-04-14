<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Exception\ConfigNotFoundException;

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
		$parameter = null;
		foreach ($this->exposeConfiguration() as $configItem)
		{
			if ($configItem->getCode() === $configCode)
			{
				$parameter = $configItem;
			}
		}
		if ($parameter === null)
		{
			throw new ConfigNotFoundException($configCode);
		}
		if (!array_key_exists($configCode, $this->config) && $parameter->getRequired() !== false)
		{
			throw new ConfigNotFoundException($configCode);
		}
		return $this->config[$configCode] ?? null;
	}
}