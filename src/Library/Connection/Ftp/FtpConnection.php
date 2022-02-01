<?php


namespace iikoExchangeBundle\Connection\Ftp;


use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Configuration\ConfigType\AbstractConfigItem;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemInt;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPassword;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemSelect;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Contract\Request\FtpRequestInterface;
use iikoExchangeBundle\Exception\ConnectionException;

class FtpConnection extends Connection
{
	const CODE = "FTP_CONNECTION";

	const CONFIG_HOST = 'CONFIG_HOST';
	const CONFIG_TYPE = 'CONFIG_TYPE';
	const CONFIG_PORT = 'CONFIG_PORT';

	const CONFIG_USERNAME = 'CONFIG_USERNAME';
	const CONFIG_PASSWORD = 'CONFIG_PASSWORD';

	public function getType(): string
	{
		return 'ftp';
	}

	/**
	 * @param FtpRequestInterface $request
	 * @return Response
	 * @throws ConnectionException
	 * @throws \iikoExchangeBundle\Exception\ConfigNotFoundException
	 */
	public function sendRequest($request): Response
	{
		if (!($request instanceof FtpRequestInterface))
		{
			throw new ConnectionException("Request must be ftp-request type");
		}
		if ($this->getConfigValue(self::CONFIG_TYPE) === 'SFTP')
		{
			$connection = new SftpConnection($this->code);
			$connection->setConfigCollection($this->config);
			return $connection->sendRequest($request);
		}

		$connection = $this->login();
		@ftp_pasv($connection, true);

		if (!@ftp_chdir($connection, $request->getFilePath()))
		{
			if (!ftp_mkdir($connection, $request->getFilePath()) || !ftp_chdir($connection, $request->getFilePath()))
			{
				throw new ConnectionException('Change dir was with error.' . (error_get_last()['message'] ?? 'N/A'));
			}
		}

		$tempHandle = fopen('php://temp', 'r+');
		fwrite($tempHandle, $request->getFileContent());
		rewind($tempHandle);

		$result = ftp_fput($connection, $request->getFileName(), $tempHandle);

		fclose($tempHandle);

		ftp_close($connection);
		if (!$result)
		{
			throw new ConnectionException('File was not uploaded.' . (error_get_last()['message'] ?? 'N/A'));
		}

		return new Response(200, [], 'ok');
	}

	protected function login()
	{
		$connection = ftp_connect($this->getConfigValue(self::CONFIG_HOST), $this->getConfigValue(self::CONFIG_PORT));
		if (!$connection)
		{
			throw new ConnectionException("Unable to connect to {$this->getConfigValue(self::CONFIG_HOST)}");
		}
		if (!ftp_login($connection, $this->getConfigValue(self::CONFIG_USERNAME), $this->getConfigValue(self::CONFIG_PASSWORD)))
		{
			throw new ConnectionException("Unable to auth to {$this->getConfigValue(self::CONFIG_HOST)}");
		}
		return $connection;
	}

	public function exposeConfiguration(): array
	{
		return [
			new ConfigItemSelect(self::CONFIG_TYPE, 'FTP_TYPE', 'SFTP', true),
			new ConfigItemString(self::CONFIG_HOST),
			new ConfigItemInt(self::CONFIG_PORT),
			new ConfigItemString(self::CONFIG_USERNAME),
			new ConfigItemPassword(self::CONFIG_PASSWORD),
		];
	}


}