<?php


namespace iikoExchangeBundle\Library\Provider;


use GuzzleHttp\Psr7\Request;
use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\ExtensionTrait\ExchangeNodeTrait;

class Provider implements ExchangeNodeInterface
{
	const FIELD_CONNECTION = 'connection';

	use ExchangeNodeTrait
	{
		ExchangeNodeTrait::jsonSerialize as public nodeJsonSerialize;
	}


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
		return $this->nodeJsonSerialize() + [self::FIELD_CONNECTION => $this->getConnection()];
	}

	public function sendRequest($request)
	{
		$response = $this->connection->sendRequest($request);
		if ($response->getStatusCode() >= 300)
		{
			throw new \Exception($response->getStatusCode() >= 300 ? $response->getStatusCode() : 500);
		}
		return $response->getBody()->__toString();
	}

	public function getChildNodes(): array
	{
		return [$this->getConnection()];
	}
}