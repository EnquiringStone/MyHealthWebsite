<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 11-9-13
 * Time: 19:14
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\ApiBundle\EventListener;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;


class MyHealthExceptionListener {

	/**
	 * @var \Symfony\Bundle\FrameworkBundle\Translation\Translator
	 */
	protected $trans;

	public function __construct(Translator $trans) {
		$this->trans = $trans;
	}

	public function onKernelException(GetResponseForExceptionEvent $event) {
		$response = new Response();
		$response->headers->set('Content-Type', 'application/json');
		$exception = $event->getException();
		$response->setContent(json_encode(array('message' => $this->trans->trans($exception->getMessage()), 'error' => true)));
		$event->setResponse($response);
	}
}