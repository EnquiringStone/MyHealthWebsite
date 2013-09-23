<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 23-9-13
 * Time: 16:37
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Service;

use FOS\UserBundle\Model\UserManager;
use MyHealth\UserBundle\Entity\User;

class ProfileService {

	protected $userManager;

	public function __construct(UserManager $userManager) {
		$this->userManager = $userManager;
	}

	public function changePassword($password, $confirm_password, User $user) {
		if($this->isEqual($password, $confirm_password) && !empty($password)) {
			$user->setPlainPassword($password);
			$this->userManager->updateUser($user);
		}
	}

	public function changeEmail($email, $confirm_email, User $user) {
		if($this->isEqual($email, $confirm_email) && !empty($email)) {
			$user->setEmail($email);
			$this->userManager->updateUser($user);
		}
	}

	/**
	 * @param $value1
	 * @param $value2
	 * @return bool
	 */
	protected function isEqual($value1, $value2) {
		return $value1 == $value2;
	}
}