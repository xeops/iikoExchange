<?php


namespace iikoExchangeBundle\Connection\Ftp;


use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemInt;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemPassword;
use iikoExchangeBundle\Configuration\ConfigType\ConfigItemString;
use iikoExchangeBundle\Connection\Connection;

class FtpConnection extends Connection
{
	const CODE = "FTP_CONNECTION";

	const CONFIG_HOST = 'CONFIG_HOST';
	const CONFIG_PORT = 'CONFIG_PORT';

	const CONFIG_USERNAME = 'CONFIG_USERNAME';
	const CONFIG_PASSWORD = 'CONFIG_PASSWORD';


	public function sendRequest($handle)
	{
		if (!is_resource($handle))
		{
			throw new \Exception("Request must be resource type");
		}
		$meta = stream_get_meta_data($handle);

		$fileInfo = explode(DIRECTORY_SEPARATOR, str_replace(sys_get_temp_dir(), "", $meta['uri']));

		$fileName = $fileInfo[array_key_last($fileInfo)];
		unset($fileInfo[array_key_last($fileInfo)]);

		$connection = $this->login();
		$path = implode(DIRECTORY_SEPARATOR, $fileInfo);
		if (!ftp_chdir($connection, $path))
		{
			throw new \Exception();
		}

		$result = ftp_fput($connection, $fileName, $handle);

		fclose($handle);

		if (!$result)
		{
			throw new \Exception();
		}

		return new Response(200, [], 'ok');
	}

	protected function login()
	{
		$connection = ftp_connect($this->getConfigValue(self::CONFIG_HOST));
		if (!$connection)
		{
			throw new \Exception();
		}
		if (!ftp_login($connection, $this->getConfigValue(self::CONFIG_USERNAME), $this->getConfigValue(self::CONFIG_PASSWORD)))
		{
			throw new \Exception();
		}
		return $connection;
	}

	public function exposeConfiguration(): array
	{
		return [
			new ConfigItemString(self::CONFIG_HOST),
			new ConfigItemInt(self::CONFIG_PORT),
			new ConfigItemString(self::CONFIG_USERNAME),
			new ConfigItemPassword(self::CONFIG_PASSWORD),
		];
	}


}