<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 23-9-13
 * Time: 11:44
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\ApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder,
	Symfony\Component\DependencyInjection\Loader\XmlFileLoader,
	Symfony\Component\HttpKernel\DependencyInjection\Extension,
	Symfony\Component\Config\FileLocator;

class MyHealthApiExtension extends Extension {
	public function load(array $configs, ContainerBuilder $container) {
		$loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
//		$config = $this->processConfiguration(new Configuration(), $configs);
		$loader->load('services.xml');
	}

	public function getAlias() {
		return 'my_health_api';
	}
}