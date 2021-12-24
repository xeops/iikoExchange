<?php

namespace iikoExchangeBundle\Library\OptionSet;

use iikoExchangeBundle\Contract\Connection\ConnectionInterface;
use iikoExchangeBundle\Contract\OptionSet\OptionSetInterface;

abstract class BaseOptionSet implements OptionSetInterface
{
	private ConnectionInterface $connection;

	public function __construct(ConnectionInterface $connection)
	{
		$this->connection = $connection;
	}

	public function getConnection(): ConnectionInterface
	{
		return $this->connection;
	}
}