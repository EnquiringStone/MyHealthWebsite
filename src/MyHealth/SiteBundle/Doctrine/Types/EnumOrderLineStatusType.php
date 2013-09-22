<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:58
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Doctrine\Types;

class EnumOrderLineStatusType extends EnumType {
	const TYPE_UNPAID			= 'Unpaid';
	const TYPE_PAID				= 'Paid';
	const TYPE_PAY_FOR_ITSELF	= 'Pay for itself';

	protected $name = 'enumorderlinestatustype';

	protected $values = array(
		self::TYPE_PAID,
		self::TYPE_PAY_FOR_ITSELF,
		self::TYPE_UNPAID
	);
}