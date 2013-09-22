<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:38
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Doctrine\Types;

use Doctrine\DBAL\Types\Type,
	Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class EnumType
 * @package ChallengeSuggestion\DefaultBundle\Doctrine\Types
 */
abstract class EnumType extends Type {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var array
	 */
	protected $values = array();

	/**
	 * @param array $fieldDeclaration
	 * @param AbstractPlatform $platform
	 * @return string
	 */
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
		$values = array_map(function($val){ return "'".$val."'";}, $this->values);

		return "ENUM(".implode(", ", $values).") COMMENT '(DC2Type:".$this->name.")'";
	}

	/**
	 * @param mixed $value
	 * @param AbstractPlatform $platform
	 * @return mixed
	 */
	public function convertToPHPValue($value, AbstractPlatform $platform) {
		return $value;
	}

	/**
	 * @param mixed $value
	 * @param AbstractPlatform $platform
	 * @return mixed
	 * @throws \InvalidArgumentException
	 */
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if(!in_array($value, $this->values)) {
			throw new \InvalidArgumentException("Invalid '".$this->name."' value.");
		}
		return $value;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return array
	 */
	public function getValues() {
		return $this->values;
	}
}