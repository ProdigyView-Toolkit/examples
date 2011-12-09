<?php

Class Template extends He2Object {

	private $registry;
	private $request;
	private $tempate_path;
	private $vars = array();

	function __construct($registry, $request) {
		
		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $registry, $request);
		
		$filtered = self::_applyFilter(get_class(), __FUNCTION__, array('registry' => $registry, 'request' => $request), array('event' => 'args'));
		$registry = $filtered['registry'];
		$request = $filtered['request'];
		
		$filtered = self::_applyFilter(get_called_class(), __FUNCTION__, array('registry' => $registry, 'request' => $request), array('event' => 'args'));
		$registry = $filtered['registry'];
		$request = $filtered['request'];
		
		$this -> registry = $registry;
		$this -> request = $request;

		spl_autoload_register(array($this, 'templateExtensionLoader'));

	}

	public function templateExtensionLoader($class) {
		
		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $class );
		
		$filename = $class . '.php';
		$file = SITE_PATH . 'extensions' . DS . 'template' . DS . $filename;
		if (!file_exists($file)) {
			return false;
		}
		require_once $file;
		//$object_name=strtolower($class);
		//$object= new $class;
		//$this->vars[$object_name]=$object;
	}

	function loadTemplateExtensions() {
		
		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__);
		
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
		
		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $view, $template);
		
		$filtered = self::_applyFilter(get_class(), __FUNCTION__, array('view' => $view, 'template' => $template), array('event' => 'args'));
		$view = $filtered['view'];
		$template = $filtered['template'];
		
		$filtered = self::_applyFilter(get_called_class(), __FUNCTION__, array('view' => $view, 'template' => $template), array('event' => 'args'));
		$view = $filtered['view'];
		$template = $filtered['template'];

		$path = SITE_PATH . '/views' . '/' . $view['view'] . '/' . $view['prefix'] . '.' . $view['type'] . '.' . $view['extension'];

		if (file_exists($path) == false) {
			throw new Exception('Template not found in ' . $path);
			return false;
		}

		$this -> tempate_path = $path;
		
		if(!$template['disable'])
			include (PV_TEMPLATES. $template['prefix'] . '.' . $template['type'] . '.' . $template['extension']);
	}

	function content() {
		
		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__);

		foreach ($this->vars as $key => $value) {
			$$key = $value;
		}

		include ($this -> tempate_path);
	}

}
?>
