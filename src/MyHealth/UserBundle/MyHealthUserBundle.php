<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 11:25
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Doctrine\DBAL\Types\Type;

class MyHealthUserBundle extends Bundle {
	public function boot() {
		$em = $this->container->get('doctrine.orm.entity_manager');

		Type::addType('enumgendertype', 'MyHealth\SiteBundle\Doctrine\Types\EnumGenderType');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enumgendertype', 'enumgendertype');

		Type::addType('enummeasurementtype', 'MyHealth\SiteBundle\Doctrine\Types\EnumMeasurementType');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enummeasurementtype', 'enummeasurementtype');

		Type::addType('enumorderlinestatustype', 'MyHealth\SiteBundle\Doctrine\Types\EnumOrderLineStatusType');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enumorderlinestatustype', 'enumorderlinestatustype');
	}
}