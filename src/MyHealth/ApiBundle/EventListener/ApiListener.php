<?php
/**
 * Created by JetBrains PhpStorm.
 * User: EnquiringStone
 * Date: 10-9-13
 * Time: 21:43
 * To change this template use File | Settings | File Templates.
 */
namespace MyHealth\ApiBundle\EventListener;

use MyHealth\ApiBundle\Interfaces\ApiInterface;

use Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpKernel\Event\GetResponseEvent;

class ApiListener {

	protected $listenTo = array('/api');

	protected $ignoreParams = array('name', 'method');

	protected $classes = array();

	public function __construct() {
		foreach(func_get_args() as $arg) {
			if($arg instanceof ApiInterface) {
				$this->classes[$arg->getName()] = $arg;
			}
		}
	}

	/**
	 * @param GetResponseEvent $event
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Exception
	 */
	public function onKernelRequest(GetResponseEvent $event) {
		if(in_array($event->getRequest()->getPathInfo(), $this->listenTo)) {
			$params = ($event->getRequest()->getMethod() == 'POST') ? $event->getRequest()->request->all() : $event->getRequest()->query->all();
			if(array_key_exists('method', $params)) {
				$params = $this->parseArguments($params);
				$class = null;
				if(array_key_exists('name', $params)) {
					$class = (array_key_exists($params['name'], $this->classes)) ? $this->classes[$params['name']] : null;
					if($class === null) throw new \Exception("The name doesn't match any know names");
					if(method_exists($class, $params['method'])) {
						$data = call_user_func(array($class, $params['method']), $this->getArguments($params));
						$data = is_array($data) ? $data : array($data);
						$data = array_merge($data, array('error' => false));
						$event->setResponse($this->createResponse($data));
						return $event->getResponse();
					}
					throw new \Exception("The method doesn't exist");
				}
				throw new \Exception("The name has not been sent with the request");

			}
			throw new \Exception('The method has not been sent with the request');
		}
	}

	protected function parseArguments($arguments) {
		foreach($arguments as &$param) {
			$param = base64_decode($param);
		}
		return $arguments;
	}

	protected function getArguments($data) {
		$params = array();
		foreach($data as $key=>$param) {
			if(!in_array($key, $this->ignoreParams)) {
				$params[$key] = $param;
			}
		}
		return $params;
	}

	protected function createResponse($content) {
		$content = is_array($content) ? $content : array('data' => $content);
		$response = new Response();
		$response->headers->set('Content-Type', 'application/json');
		$response->setContent(json_encode($content));
		return $response;
	}
}