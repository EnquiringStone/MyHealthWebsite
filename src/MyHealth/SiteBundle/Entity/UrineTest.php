<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 22-9-13
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_health_urine_test")
 */
class UrineTest {

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
	 * @ORM\Column(type="text")
	 */
	protected $image_path;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $image_title;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $result;

	/**
	 * @ORM\ManyToOne(targetEntity="MyHealth\UserBundle\Entity\User", inversedBy="urine_tests")
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
     * @return UrineTest
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
     * Set image_path
     *
     * @param string $imagePath
     * @return UrineTest
     */
    public function setImagePath($imagePath)
    {
        $this->image_path = $imagePath;
    
        return $this;
    }

    /**
     * Get image_path
     *
     * @return string 
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * Set image_title
     *
     * @param string $imageTitle
     * @return UrineTest
     */
    public function setImageTitle($imageTitle)
    {
        $this->image_title = $imageTitle;
    
        return $this;
    }

    /**
     * Get image_title
     *
     * @return string 
     */
    public function getImageTitle()
    {
        return $this->image_title;
    }

    /**
     * Set result
     *
     * @param string $result
     * @return UrineTest
     */
    public function setResult($result)
    {
        $this->result = $result;
    
        return $this;
    }

    /**
     * Get result
     *
     * @return string 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set user
     *
     * @param \MyHealth\UserBundle\Entity\User $user
     * @return UrineTest
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