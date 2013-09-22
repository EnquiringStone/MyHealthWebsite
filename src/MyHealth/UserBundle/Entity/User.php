<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 11:21
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_health_user")
 */
class User extends BaseUser {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\OneToMany(targetEntity="MyHealth\SiteBundle\Entity\Bill", mappedBy="user")
	 */
	private $bills;

	/**
	 * @ORM\OneToMany(targetEntity="MyHealth\SiteBundle\Entity\Measurement", mappedBy="user")
	 */
	private $measurements;

	/**
	 * @ORM\OneToMany(targetEntity="MyHealth\SiteBundle\Entity\UrineTest", mappedBy="user")
	 */
	private $urine_tests;

	public function __construct() {
		parent::__construct();
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
     * Add bills
     *
     * @param \MyHealth\SiteBundle\Entity\Bill $bills
     * @return User
     */
    public function addBill(\MyHealth\SiteBundle\Entity\Bill $bills)
    {
        $this->bills[] = $bills;
    
        return $this;
    }

    /**
     * Remove bills
     *
     * @param \MyHealth\SiteBundle\Entity\Bill $bills
     */
    public function removeBill(\MyHealth\SiteBundle\Entity\Bill $bills)
    {
        $this->bills->removeElement($bills);
    }

    /**
     * Get bills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBills()
    {
        return $this->bills;
    }

    /**
     * Add measurements
     *
     * @param \MyHealth\SiteBundle\Entity\Measurement $measurements
     * @return User
     */
    public function addMeasurement(\MyHealth\SiteBundle\Entity\Measurement $measurements)
    {
        $this->measurements[] = $measurements;
    
        return $this;
    }

    /**
     * Remove measurements
     *
     * @param \MyHealth\SiteBundle\Entity\Measurement $measurements
     */
    public function removeMeasurement(\MyHealth\SiteBundle\Entity\Measurement $measurements)
    {
        $this->measurements->removeElement($measurements);
    }

    /**
     * Get measurements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMeasurements()
    {
        return $this->measurements;
    }

    /**
     * Add urine_tests
     *
     * @param \MyHealth\SiteBundle\Entity\UrineTest $urineTests
     * @return User
     */
    public function addUrineTest(\MyHealth\SiteBundle\Entity\UrineTest $urineTests)
    {
        $this->urine_tests[] = $urineTests;
    
        return $this;
    }

    /**
     * Remove urine_tests
     *
     * @param \MyHealth\SiteBundle\Entity\UrineTest $urineTests
     */
    public function removeUrineTest(\MyHealth\SiteBundle\Entity\UrineTest $urineTests)
    {
        $this->urine_tests->removeElement($urineTests);
    }

    /**
     * Get urine_tests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUrineTests()
    {
        return $this->urine_tests;
    }
}