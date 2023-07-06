<?php

namespace iikoExchangeBundle\Contract\Request;

interface FtpRequestInterface
{
	public function getFilePath(): string;

	public function getFileName(): string;

	public function getFileContent(): string;

	public function isFileAppend(): bool;
}