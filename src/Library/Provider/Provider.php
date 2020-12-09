<?php


namespace iikoExchange\Library\Provider;


use iikoExchange\Connection\Connection;
use iikoExchange\Contract\ExchangeNodeInterface;
use iikoExchange\ExtensionTrait\ExchangeNodeTrait;

class Provider implements ExchangeNodeInterface
{
	const FIELD_CONNECTION = 'connection';

	use ExchangeNodeTrait;

	protected Connection $connection;

	public function __construct(string $code, Connection $connection)
	{
		$this->code = $code;
		$this->connection = $connection;
	}

	/**
	 * @return Connection
	 */
	public function getConnection(): Connection
	{
		return $this->connection;
	}


	public function jsonSerialize()
	{
		return [
			self::FIELD_CODE => $this->getCode(),
			self::FIELD_CONNECTION => $this->getConnection()
		];
	}
}