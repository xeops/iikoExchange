<?php


namespace iikoExchangeBundle\Connection\Ftp;


use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Exception\ConnectionException;
use phpseclib\Net\SFTP;

class SftpConnection extends FtpConnection
{
	protected SFTP $ftp;

	const CODE = 'SFTP_CONNECTION';

	public function sendRequest($handle) : Response
	{
		if (!is_resource($handle))
		{
			throw new \Exception("Request must be resource type");
		}
		$this->login();

		$meta = stream_get_meta_data($handle);
		$fileInfo = explode(DIRECTORY_SEPARATOR, str_replace(sys_get_temp_dir(), "", $meta['uri']));

		$fileName = $fileInfo[array_key_last($fileInfo)];
		unset($fileInfo[array_key_last($fileInfo)]);

		$remoteFile = implode(DIRECTORY_SEPARATOR, $fileInfo) . "/" . $fileName;

		$this->ftp->setTimeout(90);

		$dirname = dirname($remoteFile);
		if (! $this->ftp->chdir($dirname))
		{
			$this->ftp->mkdir($dirname, -1, true);
		}

		$isSend = $this->ftp->put($remoteFile, $meta['uri'], $this->ftp::SOURCE_LOCAL_FILE);

		$this->ftp->setTimeout(10);

		fclose($handle);
		unlink($meta['uri']);

		if (!$isSend)
		{
			throw new ConnectionException(error_get_last()['message'] ?? 'File was not uploaded.');
		}

		return new Response(200, [], 'ok');
	}

	protected function login()
	{
		$this->ftp = new SFTP($this->getConfigValue(self::CONFIG_HOST), $this->getConfigValue(self::CONFIG_PORT), 10);

		$this->ftp->login($this->getConfigValue(self::CONFIG_USERNAME), $this->getConfigValue(self::CONFIG_PASSWORD));

		return $this->ftp;
	}


}