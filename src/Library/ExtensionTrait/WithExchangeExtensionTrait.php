<?php

namespace iikoExchangeBundle\ExtensionTrait;

use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\Extensions\WithExchangeExtensionInterface;

/**
 */
trait WithExchangeExtensionTrait
{
	protected ExchangeInterface $exchange;

	/**
	 * @param ExchangeInterface $exchange
	 * @return WithExchangeExtensionInterface
	 */
	public function setExchange(ExchangeInterface $exchange): WithExchangeExtensionInterface
	{
		$this->exchange = $exchange;
		/** @var WithExchangeExtensionInterface $this */
		return $this;
	}

	public function getExchange(): ExchangeInterface
	{
		return $this->exchange;
	}
}