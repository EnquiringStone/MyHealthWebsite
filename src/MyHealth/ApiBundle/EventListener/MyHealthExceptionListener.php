<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 11-9-13
 * Time: 19:14
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\ApiBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;


class MyHealthExceptionListener {

	public function onKernelException(GetResponseForExceptionEvent $event) {
		$response = new Response();
		$response->headers->set('Content-Type', 'application/json');
		$exception = $event->getException();
		$response->setContent(json_encode(array('message' => $exception->getMessage(), 'error' => true)));
		$event->setResponse($response);
	}
}