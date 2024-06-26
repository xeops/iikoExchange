<?php


namespace iikoExchangeBundle;

define('IIKO', 'iiko');

use iikoExchangeBundle\Service\ExchangeCompilePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class iikoExchangeBundle extends Bundle
{
	const BUNDLE_CODE = 'exchange';

	public function build(ContainerBuilder $container)
	{
		parent::build($container);
		$container->addCompilerPass(new ExchangeCompilePass());
	}
}