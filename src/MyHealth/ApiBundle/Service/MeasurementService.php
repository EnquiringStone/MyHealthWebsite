<?php

namespace MyHealth\ApiBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;
use MyHealth\ApiBundle\Interfaces\ApiInterface;
use MyHealth\SiteBundle\Entity\Measurement;
use MyHealth\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

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

	public function createMeasurement($data) {
		$measurement = new Measurement();
		$measurement->setValue(doubleval($data['value']));
		$measurement->setInsertDate(new \DateTime());
		$measurement->setType($data['type']);
		$measurement->setUser($this->entity->getRepository('MyHealthUserBundle:User')->find($data['user_id']));

		$this->entity->persist($measurement);
		$this->entity->flush();
	}

	public function deleteMeasurement($data) {
		$measurement = $this->entity->getRepository('MyHealthSiteBundle:Measurement')->find($data['id']);
		$this->entity->remove($measurement);
		$this->entity->flush();
	}

	public function getMeasurements($data) {
		$measured = array();
		$measurements = $this->entity->getRepository('MyHealthSiteBundle:Measurement')->findBy(array('fk_user_id' => $data['user_id'], 'type' => $data['type']));
		foreach($measurements as $measurement) {
			$measured[] = array('id' => $measurement->getId(), 'value' => $measurement->getValue(), 'date' => $measurement->getInsertDate());
		}
		return $measured;
	}

	/**
	 * @return array
	 */
	public function getName() {
		return 'measurement';
	}
}
