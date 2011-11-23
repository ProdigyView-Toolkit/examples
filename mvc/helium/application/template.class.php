<?php

Class Template extends PVObject {

	private $registry;
	private $request;
	private $tempate_path;
	private $vars = array();

	function __construct($registry, $request) {
		$this -> registry = $registry;
		$this -> request = $request;

		spl_autoload_register(array($this, 'templateExtensionLoader'));

	}

	public function templateExtensionLoader($class) {
		$filename = $class . '.php';
		$file = __SITE_PATH . 'extensions' . DS . 'template' . DS . $filename;
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

	public function __set($index, $value) {
		$this -> vars[$index] = $value;
	}

	public function __get($index) {
		if (!isset($this -> vars[$index])) {
			$class = new $index();
			$this -> vars[$index] = $class;
		}

		return $this -> vars[$index];
	}

	function show($view, $template) {

		$path = __SITE_PATH . '/views' . '/' . $view['view'] . '/' . $view['prefix'] . '.' . $view['type'] . '.' . $view['extension'];

		if (file_exists($path) == false) {
			throw new Exception('Template not found in ' . $path);
			return false;
		}

		$this -> tempate_path = $path;
		include (PV_TEMPLATES. $template['prefix'] . '.' . $template['type'] . '.' . $template['extension']);
	}

	function content() {

		foreach ($this->vars as $key => $value) {
			$$key = $value;
		}

		include ($this -> tempate_path);
	}

}
?>
