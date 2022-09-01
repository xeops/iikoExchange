<?php

namespace iikoExchangeBundle\Contract\Connection;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;

interface OAuth2ConnectionInterface extends ConnectionInterface, ExchangeNodeInterface
{
	const CONFIG_CLIENT_ID = 'CLIENT_ID';
	const CONFIG_CLIENT_SECRET = 'CLIENT_SECRET';
	const CONFIG_REDIRECT_URI = 'REDIRECT_URI';

	const SESSION_ACCESS_TOKEN = 'ACCESS_TOKEN';
	const SESSION_ENDPOINT = 'ENDPOINT';
	const SESSION_REFRESH_TOKEN = 'REFRESH_TOKEN';

	public function getBaseAuthorisationUrl(): string;

	public function getRedirectToLoginUrl(string $clientId, string $redirectUri, string $state): string;

	public function getLoginPath(): string;

	public function getAccessTokenPath(): string;

	public function getRenewTokenPath(): string;

	public function getAuthDataMapping(): array;

	public function accessToken(string $code): void;

	public function getButtonImage(): ?string;

	public function isSingleRedirectUri(): bool;

	public function getBaseRequestUrl(): string;
}