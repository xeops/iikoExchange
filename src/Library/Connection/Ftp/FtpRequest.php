<?php

namespace iikoExchangeBundle\Connection\Ftp;

class FtpRequest implements \iikoExchangeBundle\Contract\Request\FtpRequestInterface
{
	private string $filePath;
	private string $fileName;
	private string $fileContent;
	private bool $fileAppend;

	public function __construct(string $filePath, string $fileName, string $fileContent, bool $fileAppend = false)
	{
		$this->filePath = $filePath;
		$this->fileName = $fileName;
		$this->fileContent = $fileContent;
		$this->fileAppend = $fileAppend;
	}

	/**
	 * @return string
	 */
	public function getFilePath(): string
	{
		return DIRECTORY_SEPARATOR . trim($this->filePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
	}

	/**
	 * @return string
	 */
	public function getFileName(): string
	{
		return $this->fileName;
	}

	/**
	 * @return string
	 */
	public function getFileContent(): string
	{
		return $this->fileContent;
	}

	public function isFileAppend(): bool
	{
		return $this->fileAppend;
	}

}