<?php

Class Template {

	private $registry;
	private $request;
	private $tempate_path;
	private $vars = array();
	
	/**
	 *
	 * @constructor
	 *
	 * @access public
	 *
	 * @return void
	 *
	 */
		
	function __construct($registry, $request) {
		$this->registry = $registry;
		$this->request = $request;
	
		spl_autoload_register(array($this, 'templateExtensionLoader'));
		
	}
	
	public function templateExtensionLoader($class) {
		$filename = $class. '.php';
    	$file =__SITE_PATH.'extensions'.DS.'template'.DS.$filename;
	    if (!file_exists($file)) {
			return false;
	    }
		
		require_once $file;
		//$object_name=strtolower($class);
		//$object= new $class;
		//$this->vars[$object_name]=$object;
	}
	
	
	function loadTemplateExtensions() {
		 spl_autoload_register('templateExtensionLoader');
	}
	

	
	
	 /**
	 *
	 * @set undefined vars
	 *
	 * @param string $index
	 *
	 * @param mixed $value
	 *
	 * @return void
	 *
	 */
	 public function __set($index, $value) {
	 	$this->vars[$index] = $value;
	 }
	 
	 public function __get($index) {
	 	if(!isset($this->vars[$index])){
	 		$class=new $index();
			$this->vars[$index]=$class;
		}
		
	 	return $this->vars[$index];
	 }
	 
	 
	
	
	function show($controller,$name) {
		
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && @strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$path = __SITE_PATH . '/views' . '/' .$controller. '/' . $name . '.json.php';
			$this->tempate_path=$path;
			
		} else {
			$path = __SITE_PATH . '/views' . '/' .$controller. '/' . $name . '.html.php';
		
			if (file_exists($path) == false) {
				throw new Exception('Template not found in '. $path);
				return false;
			}
		
			// Load variables
			
			$this->tempate_path=$path;
			
			include (__SITE_PATH . '/views/layouts/default.php');
		}               
	}
	
	function content() {
		
		foreach ($this->vars as $key => $value) {
			$$key = $value;
		}
		
		include ($this->tempate_path); 
	}
	
	function partial_view() {
		
	}
	
	function error($error_name){
		if(isset($this->registry->errors[$error_name])){
			foreach($this->registry->errors[$error_name] as $error) {
				echo PVTemplate::errorMessage($error);
			}//end foreach
		}
	
	}//endError


}

?>
