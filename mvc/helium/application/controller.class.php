<?php

Abstract Class Controller {

	protected $registry;

	function __construct($registry) {
		$this->registry = $registry;
	}

	
	protected function getModel($model_name){
		include(__SITE_PATH . 'model/'.$model_name.'.php');
		return new $model_name($this->registry);
	}
	
	
	abstract function index();
	
	}
	

?>
