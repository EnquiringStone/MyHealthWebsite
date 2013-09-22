<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:04
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_health_order_line")
 */
class OrderLine {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="integer", length=11)
	 */
	protected $fk_bill_id;

	/**
	 * @ORM\Column(type="integer", length=11)
	 */
	protected $code;

	/**
	 * @ORM\Column(type="decimal", length=11, scale=2)
	 */
	protected $price;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $description;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $insured;

	/**
	 * @ORM\Column(type="enumorderlinestatustype")
	 */
	protected $status;

	/**
	 * @ORM\ManyToOne(targetEntity="MyHealth\SiteBundle\Entity\Bill", inversedBy="order_lines")
	 * @ORM\JoinColumn(name="fk_bill_id", referencedColumnName="id")
	 */
	private $bill;

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
     * Set fk_bill_id
     *
     * @param integer $fkBillId
     * @return OrderLine
     */
    public function setFkBillId($fkBillId)
    {
        $this->fk_bill_id = $fkBillId;
    
        return $this;
    }

    /**
     * Get fk_bill_id
     *
     * @return integer 
     */
    public function getFkBillId()
    {
        return $this->fk_bill_id;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return OrderLine
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return OrderLine
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return OrderLine
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set insured
     *
     * @param boolean $insured
     * @return OrderLine
     */
    public function setInsured($insured)
    {
        $this->insured = $insured;
    
        return $this;
    }

    /**
     * Get insured
     *
     * @return boolean 
     */
    public function getInsured()
    {
        return $this->insured;
    }

    /**
     * Set status
     *
     * @param enumorderlinestatustype $status
     * @return OrderLine
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return enumorderlinestatustype 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set bill
     *
     * @param \MyHealth\SiteBundle\Entity\Bill $bill
     * @return OrderLine
     */
    public function setBill(\MyHealth\SiteBundle\Entity\Bill $bill = null)
    {
        $this->bill = $bill;
    
        return $this;
    }

    /**
     * Get bill
     *
     * @return \MyHealth\SiteBundle\Entity\Bill 
     */
    public function getBill()
    {
        return $this->bill;
    }
}