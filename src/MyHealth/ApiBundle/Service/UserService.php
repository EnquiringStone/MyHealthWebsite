<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 23-9-13
 * Time: 13:12
 * To change this template use File | Settings | File Templates.
 */
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
	 * @var Integer
	 */
	protected $loginAttempts;

	/**
	 * @param UserManager $manager
	 * @param EncoderFactory $factory
	 * @param EntityManager $entity
	 * @param Integer $loginAttempts
	 */
	public function __construct(UserManager $manager, EncoderFactory $factory, EntityManager $entity, $loginAttempts) {
		$this->manager = $manager;
		$this->factory = $factory;
		$this->entity = $entity;
		$this->loginAttempts = $loginAttempts;
	}

	/**
	 * @param $data
	 * @return array
	 * @throws \Exception
	 */
	public function login($data) {
		if($user = $this->manager->findUserByUsername($data['username'])) {
			if($this->canUserLogin($user)) {
				if($this->validatePassword($user, $data['password'])) {
					$token = md5(uniqid(rand(), true));
					$user->setLoginToken($token);
					$user->setAttempt(0);
					$this->manager->updateUser($user);
					return array('login_token' => $token);
				}
				$user->setAttempt($user->getAttempt() + 1);
				if($user->getAttempt() >= $this->loginAttempts) {
					$user->setEnabled(false);
					$user->setAttempt(0);
				}
				$this->manager->updateUser($user);
				throw new \Exception('The password is incorrect');
			}
			throw new \Exception('The profile has been blocked');
		}
		throw new \Exception("The user doesn't exist");
	}

	/**
	 * @param User $user
	 * @return bool
	 */
	protected function canUserLogin(User $user) {
		return $user->isEnabled() && $user->getAttempt() < $this->loginAttempts;
	}

	/**
	 * @param User $user
	 * @param $password
	 * @return bool
	 */
	protected function validatePassword(User $user, $password) {
		$encoder = $this->factory->getEncoder($user);
		return $encoder->isPasswordValid($user->getPassword(), $password, $user->getSalt());
	}

	public function getName() {
		return 'user';
	}
}