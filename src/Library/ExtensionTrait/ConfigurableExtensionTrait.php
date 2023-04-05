<?php


namespace iikoExchangeBundle\ExtensionTrait;


use iikoExchangeBundle\Exception\ConfigNotFoundException;

trait ConfigurableExtensionTrait
{
	protected array $config = [];

	protected ?array $exposedConfig = null;

	protected ?array $globalConfig = null;

	public function getConfiguration(): array
	{
		if (null === $this->exposedConfig)
		{
			$this->exposedConfig = $this->exposeConfiguration();
		}
		return $this->exposedConfig;
	}

	public function getGlobalConfiguration(): array
	{
		if (null === $this->globalConfig)
		{
			$this->globalConfig = $this->exposeGlobalConfiguration();
		}
		return $this->globalConfig;
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

	public function getConfigValue(string $configCode, bool $save = false)
	{
		if (array_key_exists($configCode, $this->config))
		{
			return $this->config[$configCode];
		}
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
			if ($save)
			{
				return null;
			}
			throw new ConfigNotFoundException($configCode);
		}
		if (!array_key_exists($configCode, $this->config) && $parameter->getRequired() !== false && empty($parameter->getValue()))
		{
			if ($save)
			{
				return null;
			}
			throw new ConfigNotFoundException($configCode);
		}
		return $parameter->getValue();
	}

	public function exposeGlobalConfiguration(): array
	{
		return [];
	}
}