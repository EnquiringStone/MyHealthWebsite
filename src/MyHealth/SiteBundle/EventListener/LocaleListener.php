<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 23-9-13
 * Time: 17:10
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\SiteBundle\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class LocaleListener {

	protected $dir;

	public function __construct($dir) {
		$this->dir = $dir;
	}

	public function onKernelRequest(GetResponseEvent $event) {
		if(!$event->getRequest()->hasPreviousSession()) {
			$event->getRequest()->getSession()->set('locale', 'en');
		}
		$event->getRequest()->setLocale($event->getRequest()->getSession()->get('locale'));
	}

	public function setLocale(Request $request, $locale) {
		$request->getSession()->set('locale', $locale);
		$this->clearCache();
	}

	protected function clearCache() {
		$files = glob($this->dir.'/translations/*');
		foreach($files as $file){
			if(is_file($file)) unlink($file);
		}
	}
}