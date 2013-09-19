<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 19-9-13
 * Time: 10:53
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {

	public function indexAction() {
		return $this->render('MyHealthSiteBundle:Index:index.html.twig');
	}
}
