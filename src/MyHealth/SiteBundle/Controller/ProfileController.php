<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 12:23
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller {
	public function indexAction() {
		return $this->render('MyHealthSiteBundle:Profile:index.html.twig');
	}
}