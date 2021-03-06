<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 11:45
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Form\Type;

use Symfony\Component\Translation\Translator,
	Symfony\Component\Form\AbstractType,
	Symfony\Component\Form\FormBuilderInterface,
	Symfony\Component\Security\Core\SecurityContext;

class LoginFormType extends AbstractType {

	protected $trans;

	public function __construct(Translator $trans) {
		$this->trans = $trans;
	}

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('username', 'text', array('label' => $this->trans->trans('Username')));
		$builder->add('password', 'password', array('label' => $this->trans->trans('Password')));
		$builder->add('remember_me', 'checkbox', array('label' => $this->trans->trans('Keep me logged in'), 'required' => false));
	}

	public function getName() {
		return 'login_form';
	}
}