<?php


namespace iikoExchangeBundle\Exchange;


class Exchange extends AbstractExchangeBuilder
{
	public function __construct(string $code)
	{
		parent::__construct($code);
	}
}