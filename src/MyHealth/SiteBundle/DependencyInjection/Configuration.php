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
//		$rootNode = $treeBuilder->root('');
//		$rootNode
//			->children()
//				->variableNode('user_amount')->isRequired()->end()
//			->end();
		return $treeBuilder;
	}
}