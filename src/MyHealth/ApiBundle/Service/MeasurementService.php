<?php

namespace MyHealth\ApiBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;
use MyHealth\ApiBundle\Interfaces\ApiInterface;
use MyHealth\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class UserService implements ApiInterface{

	/**
	 * @var \FOS\UserBundle\Model\UserManager
	 */
	protected $manager;

	/**
	 * @var \Symfony\Component\Security\Core\Encoder\EncoderFactory
	 */
	protected $factory;

	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $entity;

	/**
	 * @param UserManager $manager
	 * @param EncoderFactory $factory
	 * @param EntityManager $entity
	 * @param Integer $loginAttempts
	 */
	public function __construct(UserManager $manager, EncoderFactory $factory, EntityManager $entity) {
		$this->manager = $manager;
		$this->factory = $factory;
		$this->entity = $entity;
		//$this->loginAttempts = $loginAttempts;
	}

	/**
	 * @param $data
	 * @return array
	 * @throws \Exception
	 */
	public function getName() {
		return 'measurement';
	}
}
