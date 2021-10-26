<?php

namespace iikoExchangeBundle\Connection\iiko;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Request\IikoRequestInterface;
use Monolog\Logger;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LogLevel;

class iikoConnection extends Connection
{
	private string $server;
	private string $userName;
	private string $password;

	private ?string $key;

	public function __construct()
	{
		parent::__construct(IIKO);
	}

	/**
	 * @param IikoRequestInterface $request
	 * @return Response|void
	 */
	public function sendRequest($request)
	{
		$guzzleRequest = new Request($request->getMethod(), (new Uri($request->getPath()))->withQuery($request->getQuery()), $request->getHeaders(), $request->getBody());

		return $this->getClient()->send($guzzleRequest);
	}

	private function getClient(): Client
	{
		$handlers = HandlerStack::create();
		$handlers->push(Middleware::log(new Logger('iiko'), new MessageFormatter('{request} - {response}'), LogLevel::DEBUG));
		$handlers->push(Middleware::mapRequest(function (RequestInterface $request)
		{
			return $request->withUri(Uri::withQueryValue($request->getUri(), 'key', $this->login()));
		}));

		$handlers->push(Middleware::mapResponse(function (ResponseInterface $response)
		{
			$this->logout();
			return $response;
		}));

		return new Client(['base_uri' => $this->server, 'handler' => $handlers]);
	}

	private function login(): string
	{
		$this->key = (new Client(['base_uri' => $this->server]))->get('/resto/api/auth', ['query' => ["login" => $this->userName, "pass" => $this->password]])->getBody()->getContents();
		return $this->key;
	}

	private function logout(): void
	{
		(new Client(['base_uri' => $this->server]))->get('/resto/api/logout', ['key' => $this->key])->getBody()->getContents();
		$this->key = null;
	}

	/**
	 * @param string $server
	 */
	public function setServer(string $server): void
	{
		$this->server = $server;
	}

	/**
	 * @param string $userName
	 */
	public function setUserName(string $userName): void
	{
		$this->userName = $userName;
	}

	/**
	 * @param string $password
	 */
	public function setPassword(string $password): void
	{
		$this->password = $password;
	}


}