<?php


namespace iikoExchangeBundle\ExtensionTrait;


trait UniqueExtensionTrait
{
	protected ?string $uniq = null;

	/**
	 * @return string
	 */
	public function getUniq(): string
	{
		if (!$this->uniq)
		{
			$this->generateUniq();
		}
		return $this->uniq;
	}

	/**
	 * @param string $uniq
	 * @return $this
	 */
	public function setUniq(string $uniq)
	{
		$this->uniq = $uniq;
		return $this;
	}

	/**
	 * @return $this
	 */
	public function generateUniq()
	{
		$this->uniq = strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
			mt_rand(0, 65535),
			mt_rand(0, 65535),
			mt_rand(0, 65535),
			mt_rand(16384, 20479),
			mt_rand(32768, 49151),
			mt_rand(0, 65535),
			mt_rand(0, 65535),
			mt_rand(0, 65535)));

		return $this;
	}

}