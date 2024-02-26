<?php

namespace iikoExchangeBundle\ExtensionTrait;

use iikoExchangeBundle\Contract\Extensions\WithRevisionExtensionInterface;

/**
 * @implements WithRevisionExtensionInterface
 */
trait WithRevisionExtensionTrait
{
	protected int $revision = 0;

	public function setRevision(int $revision)
	{
		$this->revision = $revision;
	}
}