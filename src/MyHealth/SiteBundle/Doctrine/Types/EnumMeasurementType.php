<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:48
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Doctrine\Types;

class EnumMeasurementType extends EnumType {
	const TYPE_BLOOD_PRESSURE		= 'Blood Pressure';
	const TYPE_PULSE				= 'Pulse';
	const TYPE_ECG_WAVES			= 'ECG Waves';

	protected $name = 'enummeasurementtype';

	protected $values = array(
		self::TYPE_BLOOD_PRESSURE,
		self::TYPE_ECG_WAVES,
		self::TYPE_PULSE
	);
}