<?php

Abstract Class Controller extends He2Object {

	protected $registry;
	
	private $template = array();
	
	private $layout = array();

	function __construct($registry) {
		$this->registry = $registry;
		
		$default_template = array(
			'type' => 'html',
			'extension' =>'php',
			'disable' => false,
		);
		
		$this->template = $default_template;
		
		$default_layout = array(
			'prefix' => 'default',
			'type' => 'html',
			'extension' =>'php',
			'disable' => false,
		);
		
		$this->template = $default_template;
		$this->layout = $default_layout;
	}

	protected function getModel($model_name){
		include(__SITE_PATH . 'model/'.$model_name.'.php');
		return new $model_name($this->registry);
	}
	
	public function getTemplate() {
		return $this->template;
	}
	
	public function getLayout() {
		return $this->layout;
	}
	
	protected function _renderView($args = array()) {
		$args += $this -> template;
		$this -> template = $args;
	}
	
	protected function _renderLayout($args = array()) {
		$args += $this->layout;
		$this->layout = $args;
	}
	
	abstract function index();
	
	}
	

?>
