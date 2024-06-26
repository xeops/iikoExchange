<?php


namespace iikoExchangeBundle\Service;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ExchangeCompilePass implements CompilerPassInterface
{
	public function process(ContainerBuilder $container)
	{
		$this->fillExchangeDirectory($container);
		$this->fillExchangeOptionSets($container);
	}

	protected function fillExchangeDirectory(ContainerBuilder $container): void
	{
		// always first check if the primary service is defined
		if (!$container->has('exchange.directory'))
		{
			return;
		}

		$definition = $container->findDefinition('exchange.directory');

		// find all service IDs with the app.mail_transport tag
		$taggedServices = $container->findTaggedServiceIds('exchange');

		foreach ($taggedServices as $id => $tags)
		{
			// add the transport service to the ChainTransport service
			$definition->addMethodCall('add', array(new Reference($id)));
		}
	}


	protected function fillExchangeOptionSets(ContainerBuilder $container): void
	{
		// always first check if the primary service is defined
		if (!$container->has('exchange.options_sets'))
		{
			return;
		}

		$definition = $container->findDefinition('exchange.options_sets');

		// find all service IDs with the app.mail_transport tag
		$taggedServices = $container->findTaggedServiceIds('exchange.options_set');

		foreach ($taggedServices as $id => $tags)
		{
			// add the transport service to the ChainTransport service
			$definition->addMethodCall('add', array(new Reference($id)));
		}
	}
}