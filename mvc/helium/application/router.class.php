<?php

class Router {
	
	private $registry;

	private $path;

	private $args = array();

	public $file;

	public $controller;

	public $action;

	function __construct($registry) {
		$this -> registry = $registry;
	}

	function setPath($path) {

		if (is_dir($path) == false) {
			throw new Exception('Invalid controller path: `' . $path . '`');
		}
		
		$this -> path = $path;
	}

	public function loader() {
		
		$this -> getController();

		if (is_readable($this -> file) == false) {
			$this -> file = $this -> path . '/error404.php';
			$this -> controller = 'error404';
		}

		include $this -> file;

		$class = $this -> controller . 'Controller';
		$controller = new $class($this -> registry);

		if (is_callable(array($controller, $this -> action)) == false) {
			$action = 'index';
		} else {
			$action = $this -> action;
		}
		$vars = $controller -> $action();
		
		$template = $controller -> getTemplate();
		$layout = $controller -> getLayout();
		
		$template_defaults = array('view' => $this->controller, 'prefix' => $this->action);
		$template += $template_defaults;

		$this -> registry -> template -> show($template, $layout);
	}

	private function getController() {

		PVRouter::setRoute();
		$route = PVRouter::getRoute();
		$this -> controller = (empty($route['controller'])) ? PVRouter::getRouteVariable('controller') : $route['controller'];
		$this -> action = (empty($route['action'])) ? PVRouter::getRouteVariable('action') : $route['action'];

		if (empty($this -> controller)) {
			$this -> controller = 'index';
		}
		
		if (empty($this -> action)) {
			$this -> action = 'index';
		}
		
		$this -> file = $this -> path . '/' . $this -> controller . 'Controller.php';
	}

}
?>
