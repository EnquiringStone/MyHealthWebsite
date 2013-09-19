<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 11:52
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Controller;

use MyHealth\SiteBundle\Form\Type\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller {
	public function loginAction() {
		if ($this->getRequest()->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $this->getRequest()->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $this->getRequest()->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
			$this->getRequest()->getSession()->remove(SecurityContext::AUTHENTICATION_ERROR);
		}

		return $this->render('MyHealthSiteBundle:Security:login.html.twig', array(
			'error' => $error, 'login_form' => $this->createForm(new LoginFormType($this->get('translator')))->createView()
		));
	}
}