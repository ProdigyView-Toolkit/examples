<?php

class He2Object extends PVStaticPatterns {
	
	protected $_collection = null;
	
	protected $_methods = array();

	public function __set($index, $value) {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__, $index, $value);
		
		$filtered = $this->_applyFilter(get_class(), __FUNCTION__, array('index' => $index, 'value' => $value), array('event' => 'args'));
		$index = $filtered['index'];
		$value = $filtered['value'];
		
		if ($this -> _collection == null) {
			$this -> _collection = new PVCollection();
		}
		$this -> _collection -> addWithName($index, $value);
		$this->_notify(get_class() . '::' . __FUNCTION__, $index, $value);
	}

	public function __get($index) {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__, $index);
		
		$index = $this->_applyFilter(get_class(), __FUNCTION__, $index, array('event' => 'args'));
		
		if ($this -> _collection == null) {
			$this -> _collection = new PVCollection();
		}
		
		$value = $this -> _collection -> get($index);
		
		$this->_notify(get_class() . '::' . __FUNCTION__, $value, $index);
		$value = $this->_applyFilter(get_class(), __FUNCTION__, $value, array('event' => 'return'));
		
		return $value;
	}
	
	public function __call($method,$args = array()) {
  			
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__, $method, $args);
		
		$filtered = $this->_applyFilter(get_class(), __FUNCTION__, array('method' => $method, 'args' => $args), array('event' => 'args'));
		$method = $filtered['method'];
		$args = $filtered['args'];
		
  		if(isset($this->_methods[$method]))
  			$value = call_user_func_array($this->_methods[$method] , $args);
		else 
			throw new BadMethodCallException('Method \''.$method. '\' was not found in class '.get_called_class());
		
		$this->_notify(get_class() . '::' . __FUNCTION__, $value, $method, $args);
		$value = $this->_applyFilter(get_class(), __FUNCTION__, $value, array('event' => 'return'));
		
		return $value;
	}

	public function addToCollection($data) {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__, $data);
		
		$data = $this->_applyFilter(get_class(), __FUNCTION__, $data, array('event' => 'args'));
		
		if ($this -> _collection == null) {
			$this -> _collection = new PVCollection();
		}
		$this -> _collection -> add($data);
		$this->_notify(get_class() . '::' . __FUNCTION__, $data);
	}//end

	public function addToCollectionWithName($name, $data) {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__, $name, $data);
		
		$filtered = $this->_applyFilter(get_class(), __FUNCTION__, array('name' => $name, 'data' => $data), array('event' => 'args'));
		$name = $filtered['name'];
		$data = $filtered['data'];
		
		if ($this -> _collection == null) {
			$this -> _collection = new PVCollection();
		}
		$this -> _collection -> addWithName($name, $data);
		$this->_notify(get_class() . '::' . __FUNCTION__, $name, $data);
	}//end

	public function getIterator() {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__);
		
		if ($this -> _collection == null) {
			$this -> _collection = new PVCollection();
		}
		return $this -> _collection -> getIterator();
	}
	
	public function addMethod($method, $closure) {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__, $method, $closure);
		
		$filtered = $this->_applyFilter(get_class(), __FUNCTION__, array('method' => $method, 'closure' => $closure), array('event' => 'args'));
		$method = $filtered['method'];
		$closure = $filtered['closure'];
		
		$this->_methods[$method]=$closure;
		$this->_notify(get_class() . '::' . __FUNCTION__, $method, $closure);
	}

	protected function getSqlSearchDefaults() {
		
		if ($this->_hasAdapter(get_class(), __FUNCTION__))
			return $this->_callAdapter(get_class(), __FUNCTION__);
			
		$defaults = array(
			'custom_where' => '', 
			'limit' => '', 
			'order_by' => '', 
			'custom_join' => '', 
			'custom_select' => '', 
			'distinct' => '', 
			'group_by' => '', 
			'having' => '', 
			'join_users' => false, 
			'prequery' => '', 
			'current_page' => '', 
			'results_per_page' => '', 
			'paged' => '', 
			'prefix_args' => '', 
			'join_user_roles' => false, 
			'join_content' => false, 
			'join_content' => false, 
			'join_comments' => false, 
			'join_applications' => false, 
			'join_apps' => false, 
			'join_pages' => false, 
			'join_modules' => false, 
			'join_containers' => false
		);

		$defaults = $this->_applyFilter(get_class(), __FUNCTION__, $defaults, array('event' => 'return'));
		
		return $defaults;
	}
	
}
