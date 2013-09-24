<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 12:23
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Controller;

use MyHealth\SiteBundle\Form\Type\EditProfileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class ProfileController extends Controller {
	public function indexAction() {
		return $this->render('MyHealthSiteBundle:Profile:index.html.twig');
	}

	public function billAction() {
		$bills = $this->getDoctrine()->getRepository('MyHealthSiteBundle:Bill')->findBy(array('fk_user_id' => $this->get('security.context')->getToken()->getUser()->getId()));
		return $this->render('MyHealthSiteBundle:Profile:bill.html.twig', array(
			'bills' => $bills
		));
	}

	public function orderLineAction($id) {
		$billLine = $this->getDoctrine()->getRepository('MyHealthSiteBundle:OrderLine')->find($id);
		if($this->getUser()->getId() != $billLine->getBill()->getUser()->getId()) throw new AccessDeniedException('No permission for these order lines');
		return $this->render('MyHealthSiteBundle:Profile:order.line.html.twig', array(
			'line' => $billLine
		));
	}

	public function editAction() {
		if($this->getRequest()->getMethod() == 'POST'){
			$data = $this->getRequest()->request->all();
			$form = $data['edit_profile_form'];
			$this->get('my.health.profile.service')->changePassword($form['password'], $form['confirm_password'], $this->getUser());
			$this->get('my.health.profile.service')->changeEmail($form['email'], $form['confirm_email'], $this->getUser());
			return $this->redirect($this->generateUrl('MyHealthSiteBundle_profile_index'));
		}
		return $this->render('MyHealthSiteBundle:Profile:edit.html.twig', array(
			'edit_profile_form' => $this->createForm(new EditProfileFormType($this->get('translator')))->createView()
		));
	}
}