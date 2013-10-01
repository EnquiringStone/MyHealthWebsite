<?php

namespace MyHealth\ApiBundle\Service;

use Doctrine\ORM\EntityManager;

use MyHealth\ApiBundle\Interfaces\ApiInterface,
	MyHealth\SiteBundle\Entity\Measurement;

class MeasurementService implements ApiInterface{

	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $entity;

	/**
	 * @param EntityManager $entity
	 */
	public function __construct(EntityManager $entity) {
		$this->entity = $entity;
	}

	/**
	 * @param $data
	 */
	public function createMeasurement($data) {
		$measurement = new Measurement();
		$measurement->setValue(doubleval($data['value']));
		$measurement->setInsertDate(new \DateTime());
		$measurement->setType($data['type']);
		$measurement->setUser($this->getUserByLoginToken($data['login_token']));

		$this->entity->persist($measurement);
		$this->entity->flush();
	}

	/**
	 * @param $data
	 * @throws \Exception
	 */
	public function deleteMeasurement($data) {
		if($this->getUserByLoginToken($data['login_token'])) {
			$measurement = $this->entity->getRepository('MyHealthSiteBundle:Measurement')->find($data['id']);
			$this->entity->remove($measurement);
			$this->entity->flush();
			return;
		}
		throw new \Exception('Access denied');
	}

	/**
	 * @param $data
	 * @return array
	 * @throws \Exception
	 */
	public function getMeasurements($data) {
		$measured = array();
		if($user = $this->getUserByLoginToken($data['login_token'])) {
			$measurements = $this->entity->getRepository('MyHealthSiteBundle:Measurement')->findBy(array('fk_user_id' => $user->getId(), 'type' => $data['type']));
			foreach($measurements as $measurement) {
				$measured[] = array('id' => $measurement->getId(), 'value' => $measurement->getValue(), 'date' => $measurement->getInsertDate());
			}
			return $measured;
		}
		throw new \Exception('Access denied');
	}

	/**
	 * @return array
	 */
	public function getName() {
		return 'measurement';
	}

	/**
	 * @param $login_token
	 * @return object
	 */
	protected function getUserByLoginToken($login_token) {
		return $this->entity->getRepository('MyHealthUserBundle:User')->findOneBy(array('login_token' => $login_token));
	}
}
