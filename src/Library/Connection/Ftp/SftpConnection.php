<?php


namespace iikoExchangeBundle\Connection\Ftp;


use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Exception\ConnectionException;

class SftpConnection extends FtpConnection
{

	const CODE = 'SFTP_CONNECTION';

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

		$path = ssh2_sftp_realpath(ssh2_sftp($connection), implode(DIRECTORY_SEPARATOR, $fileInfo) . "/" . $fileName);

		$result = ssh2_scp_send($connection, $meta['uri'], $path);

		fclose($handle);
		unlink($meta['uri']);

		if (!$result)
		{
			throw new ConnectionException(error_get_last()['message'] ??  'File was not uploaded.');
		}

		return new Response(200, [], 'ok');
	}

	protected function login()
	{
		$connection = ssh2_connect($this->getConfigValue(self::CONFIG_HOST), $this->getConfigValue(self::CONFIG_PORT));
		if (!$connection)
		{
			throw new ConnectionException("Unable to connect to {$this->getConfigValue(self::CONFIG_HOST)}");
		}
		if (!ssh2_auth_password($connection, $this->getConfigValue(self::CONFIG_USERNAME), $this->getConfigValue(self::CONFIG_PASSWORD)))
		{
			throw new ConnectionException("Unable to auth to {$this->getConfigValue(self::CONFIG_HOST)}");
		}
		return $connection;
	}


}