<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 11:45
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Form\Type;

use Symfony\Component\Translation\IdentityTranslator,
	Symfony\Component\Form\AbstractType,
	Symfony\Component\Form\FormBuilderInterface,
	Symfony\Component\Security\Core\SecurityContext;

class LoginFormType extends AbstractType {

	protected $trans;

	public function __construct(IdentityTranslator $trans) {
		$this->trans = $trans;
	}

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('username', 'text', array('label' => $this->trans->trans('Gebruikersnaam')));
		$builder->add('password', 'password');
		$builder->add('remember_me', 'checkbox', array('label' => $this->trans->trans('Hou mij ingelogt'), 'required' => false));
	}

	public function getName() {
		return 'login_form';
	}
}