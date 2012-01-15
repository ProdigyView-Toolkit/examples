<?php

Abstract Class Controller extends He2Object {

	protected $registry;
	
	protected $_template = array();
	
	protected $_layout = array();

	/**
	 * Instantes that controller object and creates the default layout parameter
	 * 
	 * @param registry
	 * 
	 * @return void
	 * @access public
	 */
	public function __construct($registry) {
		$this->registry = $registry;
		
		$default_template = array(
			'type' => 'html',
			'extension' =>'php',
			'disable' => false,
		);
		
		$this->_template = $default_template;
		
		$default_layout = array(
			'prefix' => 'default',
			'type' => 'html',
			'extension' =>'php',
			'disable' => false,
		);
		
		$this->_template = $default_template;
		$this->_layout = $default_layout;
	}

	protected function getModel($model_name){
		include(__SITE_PATH . 'model/'.$model_name.'.php');
		return new $model_name($this->registry);
	}
	
	/**
	 * Returns the information for current template configuration that will be used when display
	 * the view associated with this model.
	 * 
	 * @return array $template The information on the template in an array
	 * @access public
	 */
	public function getTemplate() {
		return $this->_template;
	}
	
	/**
	 * Returns the information pertaining to the layout associated with the controller.
	 * 
	 * @return array $layout Returns the layout informationin on array
	 * @access public
	 */
	public function getLayout() {
		return $this->_layout;
	}
	
	/**
	 * Changes the the view
	 */
	protected function _renderView(array $args = array()) {
		$args += $this -> template;
		$this -> template = $args;
	}
	
	protected function _renderLayout(array $args = array()) {
		$args += $this->_layout;
		$this->_layout = $args;
	}
	
	abstract function index();
	
	}
	

?>
