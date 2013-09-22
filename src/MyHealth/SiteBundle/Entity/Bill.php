<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 16:54
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_health_bill")
 */
class Bill {

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
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $health_care_entity;

	/**
	 * @ORM\ManyToOne(targetEntity="MyHealth\UserBundle\Entity\User", inversedBy="bills")
	 * @ORM\JoinColumn(name="fk_user_id", referencedColumnName="id")
	 */
	private $user;

	/**
	 * @ORM\OneToMany(targetEntity="MyHealth\SiteBundle\Entity\OrderLine", mappedBy="bill")
	 */
	private $order_lines;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->order_lines = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return Bill
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
     * Set health_care_entity
     *
     * @param string $healthCareEntity
     * @return Bill
     */
    public function setHealthCareEntity($healthCareEntity)
    {
        $this->health_care_entity = $healthCareEntity;
    
        return $this;
    }

    /**
     * Get health_care_entity
     *
     * @return string 
     */
    public function getHealthCareEntity()
    {
        return $this->health_care_entity;
    }

    /**
     * Set user
     *
     * @param \MyHealth\UserBundle\Entity\User $user
     * @return Bill
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

    /**
     * Add order_lines
     *
     * @param \MyHealth\SiteBundle\Entity\OrderLine $orderLines
     * @return Bill
     */
    public function addOrderLine(\MyHealth\SiteBundle\Entity\OrderLine $orderLines)
    {
        $this->order_lines[] = $orderLines;
    
        return $this;
    }

    /**
     * Remove order_lines
     *
     * @param \MyHealth\SiteBundle\Entity\OrderLine $orderLines
     */
    public function removeOrderLine(\MyHealth\SiteBundle\Entity\OrderLine $orderLines)
    {
        $this->order_lines->removeElement($orderLines);
    }

    /**
     * Get order_lines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderLines()
    {
        return $this->order_lines;
    }
}