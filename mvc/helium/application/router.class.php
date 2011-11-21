<?php

class Router {
	 /*
	 * @the registry
	 */
	private $registry;

	 /*
	 * @the controller path
	 */
 	private $path;

 	private $args = array();

 	public $file;

 	public $controller;

 	public $action; 

	function __construct($registry) {
		$this->registry = $registry;
	}

	 /**
	 *
	 * @set controller directory path
	 *
	 * @param string $path
	 *
	 * @return void
	 *
	 */
	 function setPath($path) {
	
		/*** check if path i sa directory ***/
		if (is_dir($path) == false)
		{
			throw new Exception ('Invalid controller path: `' . $path . '`');
		}
		/*** set the path ***/
	 	$this->path = $path;
	}


	 /**
	 *
	 * @load the controller
	 *
	 * @access public
	 *
	 * @return void
	 *
	 */
	 public function loader() {
		/*** check the route ***/
		$this->getController();
		
		/*** if the file is not there diaf ***/
		if (is_readable($this->file) == false) {
			$this->file = $this->path.'/error404.php';
	                $this->controller = 'error404';
		}
	
		/*** include the controller ***/
		include $this->file;
	
		/*** a new controller class instance ***/
		$class = $this->controller . 'Controller';
		$controller = new $class($this->registry);
	
		/*** check if the action is callable ***/
		if (is_callable(array($controller, $this->action)) == false) {
			$action = 'index';
		} else {
			$action = $this->action;
		}
		/*** run the action ***/
		$vars=$controller->$action();
		
		$this->registry->template->show($this->controller, $this->action);
	 }


	 /**
	 *
	 * @get the controller
	 *
	 * @access private
	 *
	 * @return void
	 *
	 */
	private function getController() {
			
		PVRouter::setRoute();
		$route = PVRouter::getRoute();
		$this->controller = (empty($route['controller'])) ? PVRouter::getRouteVariable('controller') : $route['controller'];
		$this->action = (empty($route['action'])) ? PVRouter::getRouteVariable('action') : $route['action'];
		
		if (empty($this->controller))
		{
			$this->controller = 'index';
		}
		/*** Get action ***/
		if (empty($this->action))
		{
			$this->action = 'index';
		}
		
		/*** set the file path ***/
		$this->file = $this->path .'/'. $this->controller . 'Controller.php';
	}


}

?>
