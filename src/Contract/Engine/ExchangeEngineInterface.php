<?php

namespace iikoExchangeBundle\Contract\Engine;

use iikoExchangeBundle\Contract\ExchangeNodeInterface;
use iikoExchangeBundle\Contract\Request\ExchangeRequestInterface;
use iikoExchangeBundle\Engine\AbstractEngineBuilder;
use iikoExchangeBundle\Format\Formatter;
use iikoExchangeBundle\Library\Transform\AbstractTransformer;

interface ExchangeEngineInterface extends ExchangeNodeInterface
{
	/**
	 * @param ExchangeRequestInterface[] $requests
	 * @return AbstractEngineBuilder
	 */
	public function setRequests(array $requests): AbstractEngineBuilder;

	/**
	 * @param AbstractTransformer $transformer
	 * @return AbstractEngineBuilder
	 */
	public function setTransformer(AbstractTransformer $transformer): AbstractEngineBuilder;


	/**
	 * @param Formatter $formatter
	 * @return AbstractEngineBuilder
	 */
	public function setFormatter(Formatter $formatter): AbstractEngineBuilder;


	/**
	 * @return ExchangeRequestInterface[]
	 */
	public function getRequests(): array;

	/**
	 * @return AbstractTransformer
	 */
	public function getTransformer(): AbstractTransformer;

	/**
	 * @return Formatter
	 */
	public function getFormatter(): Formatter;

	public function getChildNodes(): array;
}