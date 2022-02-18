<?php

namespace iikoExchangeBundle\Connection\OAuth2;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPassword;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Connection\OAuth2ConnectionInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Contract\Request\OAuth2RequestInterface;
use iikoExchangeBundle\Contract\Service\ConnectionSessionStorage;
use iikoExchangeBundle\Exception\ConnectionException;
use Monolog\Logger;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use function GuzzleHttp\Psr7\modify_request;


abstract class OAuth2 extends Connection implements OAuth2ConnectionInterface
{
	protected ConnectionSessionStorage $sessionStorage;
	protected LoggerInterface $logger;

	public function __construct(string $code, ConnectionSessionStorage $sessionStorage, LoggerInterface $logger)
	{
		parent::__construct($code);
		$this->sessionStorage = $sessionStorage;
		$this->logger = $logger;
	}

	const CODE = 'OAUTH2';

	public function getType(): string
	{
		return 'OAUTH2';
	}

	/**
	 * @param OAuth2RequestInterface $request
	 * @return Response
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function sendRequest($request): Response
	{
		$client = (new Client([
			'base_uri' => $this->getBaseRequestUrl(), 'http_errors' => false, 'handler' => $this->createHandlers()
		]));

		return $client->send(new Request($request->getMethodType(), (new Uri($request->getPath()))->withQuery(implode("&", $request->getQuery())), $request->getHeaders(), $request->getBody()));
	}

	public function getBaseRequestUrl(): string
	{
		return $this->getEndpoint();
	}


	protected function sessionMiddleware(HandlerStack $stack)
	{
		$stack->push(Middleware::mapRequest(function (RequestInterface $request): RequestInterface
		{
			if (!$this->sessionStorage->has($this->getSessionKey()))
			{
				throw new ConnectionException('Session not found for clientID:' . $this->getConfigValue(self::CONFIG_CLIENT_ID));
			}
			$sessionData = json_decode($this->sessionStorage->get($this->getSessionKey()), true);

			return $request->withHeader('Authorization', $this->getAuthHeaderType() . " " . $sessionData[$this->getAuthDataMapping()[self::SESSION_ACCESS_TOKEN]]);
		}));
	}

	protected function createHandlers(): HandlerStack
	{
		$stack = HandlerStack::create();

		$this->sessionMiddleware($stack);


		$stack->push(Middleware::mapRequest(function (RequestInterface $request): RequestInterface
		{
			$this->logger->info('Exchange request.', ['connection' => $this->code, 'host' => $request->getUri()->getHost(), 'path' => $request->getUri()->getPath(), 'query' => $request->getUri()->getQuery(), 'body' => $request->getBody()->__toString(), 'headers' => $request->getHeaders()]);
			return $request;
		}));


		$stack->push(Middleware::mapResponse(function (ResponseInterface $response)
		{
			if ($response->getStatusCode() === 200)
			{
				$this->logger->info('Exhcange response. Successfully', ['connection' => $this->code]);
			}
			else
			{
				$this->logger->error('Exchange response. Error', ['connection' => $this->code, 'statusCode' => $response->getStatusCode(), 'error' => $response->getReasonPhrase(), 'body' => $response->getBody()->__toString()]);
			}
			return $response;
		}));

		$stack->push($this->reauthenticate(), 'reauthenticate');


		return $stack;

	}

	public function reauthenticate($maxRetries = 1)
	{
		return function (callable $handler) use ($maxRetries)
		{
			return function (RequestInterface $request, array $options) use ($handler, $maxRetries)
			{
				return $handler($request, $options)->then(
					function (ResponseInterface $response) use ($request, $handler, $options, $maxRetries)
					{
						if ($response->getStatusCode() == 401)
						{
							$options['reauth'] = ($options['reauth'] ?? 0) + 1;

							if ($options['reauth'] <= $maxRetries)
							{
								$request = $this->renewToken($request);
								return $handler($request, $options);
							}
						}
						return $response;
					}
				);
			};
		};
	}

	protected function renewToken(RequestInterface $request)
	{
		$sessionData = json_decode($this->sessionStorage->get($this->getSessionKey()), true);
		$this->logger->info('Exchhange OAuth2 reauth. Get session', ['session' => $sessionData]);
		$params = [
			'client_id' => $this->getConfigValue(self::CONFIG_CLIENT_ID),
			'client_secret' => $this->getConfigValue(self::CONFIG_CLIENT_SECRET),
			'redirect_uri' => $this->getConfigValue(self::CONFIG_REDIRECT_URI),
			'grant_type' => 'refresh_token',
			'refresh_token' =>$sessionData[$this->getAuthDataMapping()[self::SESSION_REFRESH_TOKEN]] ?? null,
			'scope' => $this->getScope(),
		];
		$this->logger->warning('Exchhange OAuth2 reauth. Request', ['params' => $params, 'endpoint' => $this->getEndpoint(), 'path' => $this->getRenewTokenPath()]);
		$handlers= HandlerStack::create();
		$handlers->push(Middleware::log($this->logger, new MessageFormatter('{request} - {response}'), \Psr\Log\LogLevel::INFO));
		$this->sessionMiddleware($handlers);

		$response = (new Client(['base_uri' => $this->getEndpoint(), 'http_errors' => false, 'handler' => $handlers]))->post($this->getRenewTokenPath(), [RequestOptions::BODY => json_encode($params)]);
		if ($response->getStatusCode() !== 200)
		{
			throw new ConnectionException($response->getBody()->__toString());
		}

		$authData = json_decode($response->getBody(), true);
		$this->logger->info('Exchhange OAuth2 reauth. Response', ['response' => $authData]);
		$this->sessionStorage->set($this->getSessionKey(), json_encode($authData));

		return Utils::modifyRequest($request, [
			'set_headers' => [
				'Authorization' => $this->getAuthHeaderType() . " " . $authData[$this->getAuthDataMapping()[self::SESSION_ACCESS_TOKEN]]
			]
		]);

	}

	protected function getEndpoint(): string
	{
		$sessionData = json_decode($this->sessionStorage->get($this->getSessionKey()), true);
		if (empty($sessionData) || !array_key_exists($this->getAuthDataMapping()[self::SESSION_ENDPOINT], $sessionData))
		{
			throw new ConnectionException('Session data not found');
		}

		$endpoint = $sessionData[$this->getAuthDataMapping()[self::SESSION_ENDPOINT]];
		if (strpos($endpoint, 'http') === false)
		{
			$endpoint = "https://{$endpoint}";
		}
		return $endpoint;
	}

	public function accessToken(string $code): void
	{
		$response = (new Client(['base_uri' => $this->getBaseAuthorisationUrl(), 'http_errors' => false]))->post($this->getAccessTokenPath(), [
			RequestOptions::FORM_PARAMS => [
				'client_id' => $this->getConfigValue(self::CONFIG_CLIENT_ID),
				'client_secret' => $this->getConfigValue(self::CONFIG_CLIENT_SECRET),
				'redirect_uri' => $this->getConfigValue(self::CONFIG_REDIRECT_URI),
				'grant_type' => 'authorization_code',
				'code' => $code,
				'scope' => $this->getScope()
			]
		]);

		$authData = json_decode($response->getBody(), true);

		//TODO validation of authData

		$this->sessionStorage->set($this->getSessionKey(), json_encode($authData));
	}

	protected function getSessionKey(): string
	{
		return md5(json_encode([
			$this->getConfigValue(self::CONFIG_CLIENT_ID),
			$this->getConfigValue(self::CONFIG_CLIENT_SECRET),
			$this->getConfigValue(self::CONFIG_REDIRECT_URI),
		]));
	}

	public function exposeConfiguration(): array
	{
		return [
			new ConfigItemString(self::CONFIG_CLIENT_ID),
			new ConfigItemPassword(self::CONFIG_CLIENT_SECRET),
		];
	}

	public function getRedirectToLoginUrl(string $clientId, string $redirectUri): string
	{
		return
			rtrim($this->getBaseAuthorisationUrl(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR .
			ltrim($this->getLoginPath(), DIRECTORY_SEPARATOR) .
			"?client_id={$clientId}&redirect_uri={$redirectUri}&response_type=code&scope=" . $this->getScope();
	}

	protected function getScope(): string
	{
		return 'longlife_refresh_token';
	}

	public function jsonSerialize()
	{
		return parent::jsonSerialize() + ['buttonImage' => $this->getButtonImage()];
	}

	protected function getAuthHeaderType(): string
	{
		return 'OAuth';
	}

	public function getButtonImage(): ?string
	{
		return null;
	}

	public function isSingleRedirectUri(): bool
	{
		return false;
	}

	public function getAuthDataMapping(): array
	{
		return [
			self::SESSION_ACCESS_TOKEN => 'access_token',
			self::SESSION_ENDPOINT => 'endpoint',
			self::SESSION_REFRESH_TOKEN => 'refresh_token',
		];
	}
}