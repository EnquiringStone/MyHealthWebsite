<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_health_measurement")
 */
class Measurement {

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
	 * @ORM\Column(type="enummeasurementtype")
	 */
	protected $type;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $insert_date;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $value;

	/**
	 * @ORM\ManyToOne(targetEntity="MyHealth\UserBundle\Entity\User", inversedBy="measurements")
	 * @ORM\JoinColumn(name="fk_user_id", referencedColumnName="id")
	 */
	private $user;

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
     * @return Measurement
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
     * Set type
     *
     * @param enummeasurementtype $type
     * @return Measurement
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return enummeasurementtype 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set insert_date
     *
     * @param \DateTime $insertDate
     * @return Measurement
     */
    public function setInsertDate($insertDate)
    {
        $this->insert_date = $insertDate;
    
        return $this;
    }

    /**
     * Get insert_date
     *
     * @return \DateTime 
     */
    public function getInsertDate()
    {
        return $this->insert_date;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Measurement
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set user
     *
     * @param \MyHealth\UserBundle\Entity\User $user
     * @return Measurement
     */
    public function setUser(\MyHealth\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \MyHealth\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}