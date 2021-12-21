<?php

namespace iikoExchangeBundle\Connection\OAuth2;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\RequestOptions;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPassword;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Connection\OAuth2ConnectionInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Contract\Request\OAuth2RequestInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class OAuth2 extends Connection implements OAuth2ConnectionInterface
{
	const CODE = 'OAUTH2';

	public function getType(): string
	{
		return 'OAUTH2';
	}

	public function sendRequest(ExchangeRequestInterface $request): Response
	{
		/** @var OAuth2RequestInterface $request */
		$client = (new Client([
			'base_uri' => $this->getConfigValue(self::CONFIG_ENDPOINT), 'http_errors' => false, 'handler' => $this->createHandlers()
		]));

		return $client->send(new Request($request->getMethodType(), (new Uri($request->getPath()))->withQuery(implode("&", $request->getQuery())), $request->getHeaders(), $request->getBody()));
	}

	protected function createHandlers(): HandlerStack
	{
		$stack = HandlerStack::create();

		$stack->push(Middleware::mapRequest(function (RequestInterface $request): RequestInterface
		{

			$request->withAddedHeader('Authorization', $this->getAuthHeaderType() . " " . $this->getConfigValue(self::CONFIG_ACCESS_TOKEN));
			return $request;
		}));

		$stack->push(Middleware::retry(function ($retries, RequestInterface $request, ?ResponseInterface $response = null, ?\Exception $exception = null)
		{
			if ($retries === 0 && $response && $response->getStatusCode() === 401)
			{
				$this->renewToken();
				return true;
			}
			return false;

		}));
		return $stack;

	}

	protected function renewToken()
	{

		(new Client(['base_uri' => $this->getEndpoint(), 'http_errors' => false]))->post($this->getRenewTokenPath(), [
			RequestOptions::FORM_PARAMS => [
				'client_id' => $this->getConfigValue(self::CONFIG_CLIENT_ID),
				'client_secret' => $this->getConfigValue(self::CONFIG_CLIENT_SECRET),
				'redirect_uri' => $this->getConfigValue(self::CONFIG_REDIRECT_URI),
				'grant_type' => 'refresh_token',
				'refresh_token' => $this->getConfigValue(self::CONFIG_REFRESH_TOKEN),
				'scope' => $this->getScope()
			]
		]);
	}

	protected function getEndpoint() : string
	{
		return $this->getConfigValue(self::CONFIG_ENDPOINT);
	}

	public function getAccessToken(string $code): array
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

		return json_decode($response->getBody(), true);
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

	protected function getScope() : string
	{
		return  'longlife_refresh_token';
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
}