<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:40
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Doctrine\Types;

class EnumGenderType extends EnumType {
	const TYPE_FEMALE		= 'F';
	const TYPE_MALE			= 'M';

	protected $name = 'enumgendertype';

	protected $values = array(
		self::TYPE_FEMALE,
		self::TYPE_MALE
	);
}