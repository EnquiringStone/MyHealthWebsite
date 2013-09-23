<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 23-9-13
 * Time: 16:30
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Form\Type;

use Symfony\Component\Translation\Translator,
	Symfony\Component\Form\AbstractType,
	Symfony\Component\Form\FormBuilderInterface,
	Symfony\Component\Security\Core\SecurityContext;

class EditProfileFormType extends AbstractType {
	protected $trans;

	public function __construct(Translator $trans) {
		$this->trans = $trans;
	}

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('password', 'password', array('label' => $this->trans->trans('Password'), 'required' => false));
		$builder->add('confirm_password', 'password', array('label' => $this->trans->trans('Confirm password'), 'required' => false));
		$builder->add('email', 'email', array('label' => $this->trans->trans('Email'), 'required' => false));
		$builder->add('confirm_email', 'email', array('label' => $this->trans->trans('Confirm Email'), 'required' => false));
	}

	public function getName() {
		return 'edit_profile_form';
	}
}