<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:33
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_health_general_practitioner")
 */
class GeneralPractitioner {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="integer", length=11)
	 */
	protected $fk_user_id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $email;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $name;

	/**
	 * @ORM\Column(type="enumgendertype")
	 */
	protected $gender;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fk_user_id
     *
     * @param integer $fkUserId
     * @return GeneralPractitioner
     */
    public function setFkUserId($fkUserId)
    {
        $this->fk_user_id = $fkUserId;
    
        return $this;
    }

    /**
     * Get fk_user_id
     *
     * @return integer 
     */
    public function getFkUserId()
    {
        return $this->fk_user_id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return GeneralPractitioner
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return GeneralPractitioner
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set gender
     *
     * @param enumgendertype $gender
     * @return GeneralPractitioner
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return enumgendertype 
     */
    public function getGender()
    {
        return $this->gender;
    }
}