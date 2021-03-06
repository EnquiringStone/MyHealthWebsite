<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 11:39
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
	Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {
	public function getConfigTreeBuilder() {
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('my_health_site');
		$rootNode
			->children()
				->variableNode('login_attempts')->isRequired()->end()
			->end();
		return $treeBuilder;
	}
}