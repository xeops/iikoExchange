<?php


namespace iikoExchangeBundle\Connection\Ftp;


use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Configuration\ConfigType\AbstractConfigItem;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemInt;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPassword;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemSelect;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Connection\Connection;
use iikoExchangeBundle\Exception\ConnectionException;

class FtpConnection extends Connection
{
	const CODE = "FTP_CONNECTION";

	const CONFIG_HOST = 'CONFIG_HOST';
	const CONFIG_TYPE = 'CONFIG_TYPE';
	const CONFIG_PORT = 'CONFIG_PORT';

	const CONFIG_USERNAME = 'CONFIG_USERNAME';
	const CONFIG_PASSWORD = 'CONFIG_PASSWORD';


	public function sendRequest($handle)
	{
		if($this->getConfigValue(self::CONFIG_TYPE) === 'SFTP')
		{
			$connection =  new SftpConnection($this->code);
			$connection->setConfigCollection($this->config);
			return $connection->sendRequest($handle);
		}
		if (!is_resource($handle))
		{
			throw new ConnectionException("Request must be resource type");
		}
		$meta = stream_get_meta_data($handle);

		$fileInfo = explode(DIRECTORY_SEPARATOR, str_replace(sys_get_temp_dir(), "", $meta['uri']));

		$fileName = $fileInfo[array_key_last($fileInfo)];
		unset($fileInfo[array_key_last($fileInfo)]);

		$connection = $this->login();
		@ftp_pasv($connection, true);
		$path = implode(DIRECTORY_SEPARATOR, $fileInfo);
		if (!ftp_chdir($connection, $path))
		{
			if(!ftp_mkdir($connection, $path))
			{
				throw new ConnectionException(error_get_last()['message'] ?? 'Change dir was with error.');
			}
		}

		$result = ftp_fput($connection, $fileName, $handle);

		fclose($handle);
		ftp_close($connection);
		if (!$result)
		{
			throw new ConnectionException(error_get_last()['message'] ??  'File was not uploaded.');
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