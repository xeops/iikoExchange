<?php


namespace iikoExchangeBundle\Connection\Ftp;


use GuzzleHttp\Psr7\Response;
use iikoExchangeBundle\Contract\Request\FtpRequestInterface;
use iikoExchangeBundle\Exception\ConnectionException;
use phpseclib\Net\SFTP;

class SftpConnection extends FtpConnection
{
	protected SFTP $ftp;

	const CODE = 'SFTP_CONNECTION';

	/**
	 * @param FtpRequestInterface $handle
	 * @return Response
	 * @throws ConnectionException
	 */
	public function sendRequest($request): Response
	{
		if (!($request instanceof FtpRequestInterface))
		{
			throw new ConnectionException("Request must be ftp-request type");
		}
		if ($this->getConfigValue(self::CONFIG_TYPE) === 'FTP')
		{
			$connection = new FtpConnection($this->code);
			$connection->setConfigCollection($this->config);
			return $connection->sendRequest($request);
		}

		$this->login();


		$this->ftp->setTimeout(90);


		if (!@$this->ftp->chdir($request->getFilePath()))
		{
			if (!$this->ftp->mkdir($request->getFilePath(), -1, true) || !$this->ftp->chdir($request->getFilePath()))
			{
				throw new ConnectionException('Cant change directory to ' . $request->getFilePath());
			}
		}

		$isSend = $this->ftp->put($request->getFilePath() . $request->getFileName(), $request->getFileContent(), $this->ftp::SOURCE_STRING);

		$this->ftp->setTimeout(10);


		if (!$isSend)
		{
			throw new ConnectionException(error_get_last()['message'] ?? 'File was not uploaded.');
		}

		return new Response(200, [], 'ok');
	}

	protected function login()
	{
		$this->ftp = new SFTP($this->getConfigValue(self::CONFIG_HOST), $this->getConfigValue(self::CONFIG_PORT), 10);

		if(!$this->ftp->login($this->getConfigValue(self::CONFIG_USERNAME), $this->getConfigValue(self::CONFIG_PASSWORD)))
		{
			throw new ConnectionException('Exchange connection failure: incorrect/unavailable server or wrong username/password. Please check connection settings.');
		}

		if(!$this->ftp->isConnected())
		{
			throw new ConnectionException('Exchange connection disconnected');
		}

		return $this->ftp;
	}


}