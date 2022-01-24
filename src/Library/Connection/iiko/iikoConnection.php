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
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class iikoConnection extends Connection
{
	private ?string $server;
	private ?string $userName;
	private ?string $password;
    private string $lang = 'en_GB';

	private ?string $key;
	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger)
	{
		parent::__construct(IIKO);
		$this->logger = $logger;
	}

	public function getType(): string
	{
		return IIKO;
	}

	/**
	 * @param IikoRequestInterface $request
	 * @return Response|void
	 */
	public function sendRequest($request): Response
	{
        $headers = ["Accept-Language" => $this->lang];

		$guzzleRequest = new Request($request->getMethod(), (new Uri($request->getPath()))->withQuery($request->getQuery()), array_merge($headers, $request->getHeaders()), json_encode($request->getBody()));

		$response = $this->getClient()->send($guzzleRequest);

		return new Response($response->getStatusCode(), $response->getHeaders(), $response->getBody(), $response->getProtocolVersion(), $response->getReasonPhrase());
	}

	private function getClient(): Client
	{
		$handlers = HandlerStack::create();

		$handlers->push(Middleware::mapRequest(function (RequestInterface $request)
		{
			$this->logger->info('Exchange send request to iiko', ['url' => $request->getUri(), 'headers' => $request->getHeaders(), 'method' => $request->getMethod(), 'body' => $request->getBody()->getContents()]);
			return $request->withUri(Uri::withQueryValues($request->getUri(), ['key' => $this->login(), 'client-type' => 'iikoweb-exchange']));
		}));

		$handlers->push(Middleware::mapResponse(function (ResponseInterface $response)
		{
			$this->logger->info('Exchange got result from iiko', ['code' => $response->getStatusCode()]);
			if ($response->getStatusCode() !== 200)
			{
				$this->logger->error('Exchange got error from iiko', ['error' => $response->getBody()->getContents()]);
			}
			$this->logout();
			return $response;
		}));

		return new Client(['base_uri' => $this->server, 'handler' => $handlers]);
	}

	private function login(): string
	{
		$this->key = (new Client(['base_uri' => $this->server]))->get('/resto/api/auth', ['query' => ["login" => $this->userName, "pass" => $this->password]])->getBody()->getContents();
		$this->logger->debug('Exchange successfully connected to iiko');
		return $this->key;
	}

	private function logout(): void
	{
		(new Client(['base_uri' => $this->server]))->get('/resto/api/logout?client-type=iikoweb-exchange', ['query' => ['key' => $this->key]])->getBody()->getContents();
		$this->logger->debug('Exchange successfully disconnected from iiko');
		$this->key = null;
	}

	/**
	 * @param string $server
	 */
	public function setServer(?string $server): iikoConnection
	{
		$this->server = $server;
		return $this;
	}

	/**
	 * @param string $userName
	 */
	public function setUserName(?string $userName): iikoConnection
	{
		$this->userName = $userName;
		return $this;
	}

	/**
	 * @param string $password
	 */
	public function setPassword(?string $password): iikoConnection
	{
		$this->password = $password;
		return $this;
	}


    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

}