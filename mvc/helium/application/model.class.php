<?php

Abstract Class Model extends He2Object {

	protected $registry;
	protected $errors;
	protected $_config = array(
		'create_table' => true, 
		'column_check' => true, 
		'storage' => ''
		);

	function __construct($registry = null) {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $registry);

		$registry = self::_applyFilter(get_class(), __FUNCTION__, $registry, array('event' => 'args'));
		$registry = self::_applyFilter(get_called_class(), __FUNCTION__, $registry, array('event' => 'args'));

		if ($registry == null)
			$this -> registry = new PVCollection();
		else
			$this -> registry = $registry;

		self::_notify(get_class() . '::' . __FUNCTION__, $registry);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $registry);

	}

	protected function checkSchema() {

		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__);

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__);

		$table_name = $this -> formTableName(get_class($this));
		$tablename = PVDatabase::formatTableName(strtolower($table_name));
		
		$check_table_name = (PVDatabase::getDatabaseType() == 'postgresql') ? PVDatabase::formatTableName(strtolower($table_name), false) : $tablename;
		$schema = PVDatabase::getSchema(false);

		if (!PVDatabase::tableExist($check_table_name, $schema) && isset($this -> _schema) && $this -> _config['create_table']) {
			$primary_keys = '';
			$first = 1;
			$schema = $this -> _schema;

			foreach ($schema as $key => $value) {
				if (isset($value['primary_key'])) {
					$primary_keys .= (!$first) ? ',' . $key : $key;
					$first = 0;
				} else if (isset($value['default']) && empty($value['default']) && !($value['default'] === 0)) {
					$schema[$key]['default'] = '\'\'';
				}
			}//endforeach

			$options = array('primary_key' => $primary_keys);
			PVDatabase::createTable($tablename, $schema, $options);
		} else if (isset($this -> _schema) && $this -> _config['column_check']) {
			$schema = $this -> _schema;

			foreach ($schema as $key => $value) {
				if (!PVDatabase::columnExist($check_table_name, $key)) {
					if (isset($value['default']) && empty($value['default']) && !($value['default'] === 0))
						$value['default'] = '\'\'';
					else if (isset($value['default']) && $value['type'] == 'string')
						$value['default'] = '\'' . $value['default'] . '\'';

					PVDatabase::addColumn($tablename, $key, $value);
				}
			}//end foreach
		}
	}//end checkSchema

	protected function validate($data, $options = array()) {

		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__, $data, $options);

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $data, $options);

		$defaults = array('event' => '');

		$options += $defaults;

		$filtered = self::_applyFilter(get_class(), __FUNCTION__, array('data' => $data, 'options' => $options), array('event' => 'args'));
		$data = $filtered['data'];
		$options = $filtered['options'];

		$data = self::_applyFilter(get_called_class(), __FUNCTION__, array('data' => $data, 'options' => $options), array('event' => 'args'));
		$data = $filtered['data'];
		$options = $filtered['options'];

		$hasError = true;
		$this -> errors = array();

		if (!empty($this -> _validators)) {

			foreach ($this->_validators as $field => $rules) {

				foreach ($rules as $key => $rule) {
					$rule_defaults = array('event' => '');
					$rule += $rule_defaults;

					if ($options['event'] == $rule['event'] && !PVValidator::check($key, $data[$field])) {
						$hasError = false;
						$this -> errors[$field][] = PVTemplate::errorMessage($rule['error']);
					}

				}//end second foreach
			}//end foreach

		}//end validators

		$this -> registry -> errors = $this -> errors;

		self::_notify(get_class() . '::' . __FUNCTION__, $hasError, $data);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $hasError, $data);

		return $hasError;
	}//end validate

	public function create($data, $options = array()) {

		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__, $data, $options);

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $data, $options);
		
		$defaults = array('validate' => true, 'use_schema' => true, 'sync_data' => true, 'validate_options' => array());
		$options += $defaults;

		$filtered = self::_applyFilter(get_class(), __FUNCTION__, array('data' => $data, 'options' => $options), array('event' => 'args'));
		$data = $filtered['data'];
		$options = $filtered['options'];

		$filtered = self::_applyFilter(get_called_class(), __FUNCTION__, array('data' => $data, 'options' => $options), array('event' => 'args'));
		$data = $filtered['data'];
		$options = $filtered['options'];

		$created = false;
		$id = 0;

		if (PVDatabase::getDatabaseType() != 'mongo') {
			$this -> checkSchema();
		}

		if ($this -> validate($data)) {
			$table_name = $this -> formTableName(get_class($this));
			$table_name = PVDatabase::formatTableName(strtolower($table_name));
			$defaults = $this -> getModelDefaults();
			$data += $defaults;

			$input_data = array();
			$primary_keys = array();
			$auto_incremented_field = '';

			foreach ($this->_schema as $field => $field_options) {
				$field_options += $this -> getFieldOptionsDefaults();
				$input_data[$field] = (empty($data[$field])) ? $field_options['default'] : $data[$field];

				if ($field_options['auto_increment'] == true) {
					$auto_incremented_field = $field;
				}
				
				if ($field_options['primary_key'] == true && $field_options['type'] == 'id') {
					unset($input_data[$field]);
				} else if ($field_options['primary_key'] == true && !$field_options['auto_increment']) {
					$primary_keys[$field] = $input_data[$field];
				}

				if ($field_options['unique'] == true) {
					//$primary_key=$field;
				}

			}//end foreach
		
			$options = $this -> _configureConnection($options);
			$id = PVDatabase::preparedReturnLastInsert($table_name, $auto_incremented_field, $table_name, $input_data, array(), $options);

			if ($id) {
				$conditions = array('conditions' => array($auto_incremented_field => $id));

				$this -> first($conditions);
				$created = true;
			}
		}

		self::_notify(get_class() . '::' . __FUNCTION__, $created, $id, $data, $options);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $created, $id, $data, $options);

		return $created;
	}

	/**
	 * Updates a record in the database
	 */
	public function update($data, $conditions = array(), $options = array()) {

		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__, $data, $conditions, $options);

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $data, $conditions, $options);

		$defaults = array('validate' => true, 'use_schema' => true, 'sync_data' => true, 'validate_options' => array());

		$options += $defaults;

		$filtered = self::_applyFilter(get_class(), __FUNCTION__, array('data' => $data, 'conditions' => $conditions, 'options' => $options), array('event' => 'args'));
		$data = $filtered['data'];
		$conditions = $filtered['conditions'];
		$options = $filtered['options'];

		$filtered = self::_applyFilter(get_called_class(), __FUNCTION__, array('data' => $data, 'conditions' => $conditions, 'options' => $options), array('event' => 'args'));
		$data = $filtered['data'];
		$conditions = $filtered['conditions'];
		$options = $filtered['options'];

		$result = false;

		if (!$options['validate'] || $this -> validate($data, $options['validate_options'])) {

			$table_name = $this -> formTableName(get_class($this));
			$table_name = PVDatabase::formatTableName($table_name);
			$defaults = $this -> getModelDefaults();
			$data += $defaults;
			
			$input_data = array();
			$primary_key = '';
			$wherelist = isset($conditions['conditions']) ? $conditions['conditions'] : array();

			foreach ($this->_schema as $field => $field_options) {
				$field_options += $this -> getFieldOptionsDefaults();

				if ((!isset($field_options['null']) || (isset($field_options['null']) && !$field_options['null'])) || !empty($data[$field])) {
					if ($field_options['primary_key']) {
						$primary_key = $field;
						$wherelist[$field] = (!empty($this -> _collection -> $field)) ? $field_options['default'] : $this -> _collection -> $field;
					}

					$input_data[$field] = ($this -> $field) ? $this -> $field : $data[$field];
				}

			}//end foreach

			$options = $this -> _configureConnection($options);
			$result = PVDatabase::preparedUpdate($table_name, $input_data, $wherelist, array(), array(), $options);

			$this -> addToCollection($input_data);

			if ($options['sync_data'])
				$this -> sync();
		}

		self::_notify(get_class() . '::' . __FUNCTION__, $result, $data, $conditions);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $result, $data, $conditions);

		return $result;
	}//end update

	public function delete($data) {

		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__, $data);

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $data);

		$data = self::_applyFilter(get_class(), __FUNCTION__, $data, array('event' => 'args'));
		$data = self::_applyFilter(get_called_class(), __FUNCTION__, $data, array('event' => 'args'));

		$table_name = $this -> formTableName(get_class($this));
		$table_name = PVDatabase::formatTableName(strtolower($table_name));

		$options = $this -> _configureConnection($options);
		$result = PVDatabase::preparedDelete($table_name, $data, $whereformats = '');
		self::_notify(get_class() . '::' . __FUNCTION__, $result, $data);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $result, $data);

		return $result;
	}//end delete

	public function first($conditions = array(), $options = array()) {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $conditions);

		$conditions = self::_applyFilter(get_class(), __FUNCTION__, $conditions, array('event' => 'args'));
		$conditions = self::_applyFilter(get_called_class(), __FUNCTION__, $conditions, array('event' => 'args'));

		if (PVDatabase::getDatabaseType() == 'mongo') {

			$conditions = isset($conditions['conditions']) ? $conditions['conditions'] : array();
			$fields = isset($conditions['fields']) ? $conditions['fields'] : array();

			$args = array('where' => $conditions, 'fields' => $fields, 'table' => $this -> formTableName(get_class($this)));
			$options['findOne'] = true;
			$options = $this -> _configureConnection($options);
			$result = PVDatabase::selectStatement($args, $options);

			if ($result) {
				foreach ($result as $key => $value) {

					if (!PVValidator::isInteger($key))
						$this -> addToCollectionWithName($key, $value);
				}
			}//end if result

		} else {

			$this -> checkSchema();

			$defaults = array('conditions' => array());
			$conditions += $defaults;
			$table_name = $this -> formTableName(get_class($this));
			$table_name = PVDatabase::formatTableName(strtolower($table_name));
			$input_data = array();
			$query = 'SELECT * FROM ' . $table_name . ' ';

			if (isset($conditions['join']) && isset($this -> _joins)) {
				foreach ($conditions['join'] as $join) {

					if (isset($this -> _joins[$join]))
						$query .= $this -> joinTable($this -> _joins[$join]) . ' ';

				}//end foreach
			}

			$WHERE_CLAUSE = '';
			$first = true;
			$placeholder_count = 1;
			foreach ($conditions['conditions'] as $key => $condition) {
				if (is_array($condition)) {

				} else {
					if ($first)
						$WHERE_CLAUSE .= $key . '='.PVDatabase::getPreparedPlaceHolder($placeholder_count);
					else
						$WHERE_CLAUSE .= ' AND ' . $key . '='.PVDatabase::getPreparedPlaceHolder($placeholder_count);

					$input_data[$key] = $condition;
					$first = false;
				}
				$placeholder_count++;
			}//end foreach

			if (!empty($WHERE_CLAUSE)) {
				$query .= 'WHERE ' . $WHERE_CLAUSE . ' ';
			}

			$query .= 'LIMIT 1';
			
			$result = PVDatabase::preparedSelect($query, $input_data, $formats = '');
			$row = PVDatabase::fetchArray($result);
			
			if(!empty($row)) {
				foreach ($row as $key => $value) {
					if (!PVValidator::isInteger($key))
						$this -> addToCollectionWithName($key, $value);
				}
			}
		}

		self::_notify(get_class() . '::' . __FUNCTION__, $conditions);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $conditions);
	}

	public function find($conditions = array(), $options = array()) {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $conditions);

		$conditions = self::_applyFilter(get_class(), __FUNCTION__, $conditions, array('event' => 'args'));
		$conditions = self::_applyFilter(get_called_class(), __FUNCTION__, $conditions, array('event' => 'args'));
		if (PVDatabase::getDatabaseType() == 'mongo') {
			
			$args = array(
				'where' => isset($conditions['conditions']) ? $conditions['conditions'] : array(), 
				'fields' => isset($conditions['fields']) ? $conditions['fields'] : array(), 
				'table' => $this -> formTableName(get_class($this)),
				'limit' => isset($conditions['limit']) ? $conditions['limit'] : null,
				'offset' => isset($conditions['offset']) ? $conditions['offset'] : null,
				'order_by' => isset($conditions['order_by']) ? $conditions['order_by'] : null,
				
			);
			
			$options = $this -> _configureConnection($options);
			$result = PVDatabase::selectStatement($args, $options);

			foreach ($result as $row) {
				$this -> addToCollection($row);
			}

		} else {
			$this -> checkSchema();

			$table_name = $this -> formTableName(get_class($this));
			$table_name = PVDatabase::formatTableName(strtolower($table_name));
			$input_data = array();
			$query = 'SELECT * FROM ' . $table_name . ' ';

			if (isset($conditions['join']) && isset($this -> _joins)) {
				foreach ($conditions['join'] as $join) {

					if (isset($this -> _joins[$join]))
						$query .= $this -> joinTable($this -> _joins[$join]) . ' ';

				}//end foreach
			}

			$WHERE_CLAUSE = '';
			$first = true;
			$placeholder_count = 1;
			if (isset($conditions['conditions'])) {
				foreach ($conditions['conditions'] as $key => $condition) {
					if (is_array($condition)) {

					} else {
						if ($first)
							$WHERE_CLAUSE .= $key . '='.PVDatabase::getPreparedPlaceHolder($placeholder_count);
						else
							$WHERE_CLAUSE .= ' AND ' . $key . '='.PVDatabase::getPreparedPlaceHolder($placeholder_count);

						$input_data[$key] = $condition;
						$first = false;
					}
					$placeholder_count++;
				}//end foreach

				if (!empty($WHERE_CLAUSE)) {
					$query .= 'WHERE ' . $WHERE_CLAUSE . ' ';
				}
			}
			
			$result = PVDatabase::preparedSelect($query, $input_data);
			
			if(PVDatabase::getDatabaseType() == 'postgresql') {
				while($row = PVDatabase::fetchFields($result))
					$this -> addToCollection($row);
			} else {
				$rows = PVDatabase::fetchFields($result);
				
				if(!empty($rows)) {
					foreach ($rows as $row) {
					
						$this -> addToCollection($row);
					}
				}
			}
		}
		
		self::_notify(get_class() . '::' . __FUNCTION__, $conditions);
		self::_notify(get_called_class() . '::' . __FUNCTION__, $conditions);
	}

	protected function joinTable($args = array()) {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $args);

		$args = self::_applyFilter(get_class(), __FUNCTION__, $args, array('event' => 'args'));
		$args = self::_applyFilter(get_called_class(), __FUNCTION__, $args, array('event' => 'args'));

		$defaults = array('type' => 'natural', 'alias' => '', 'on' => '', 'format_table' => true);

		$args += $defaults;

		$table = ($args['format_table']) ? PVDatabase::formatTableName(strtolower($args['table'])) : $args['table'];

		switch(strtolower($args['type'])) :
			case 'left' :
				$join = 'LEFT JOIN';
				break;
			case 'right' :
				$join = 'RIGHT JOIN';
				break;
			case 'join' :
				$join = 'JOIN';
				break;
			case 'full' :
				$join = 'FULL JOIN';
				break;
			default :
				$join = 'NATURAL JOIN';
		endswitch;

		$join .= ' ' . $table;

		if (!empty($args['alias']))
			$join .= ' AS ' . $args['alias'];

		if (!empty($args['on']))
			$join .= ' ON ' . $args['on'];

		return $join;
	}

	public function sync() {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__);

		if (!isset($this -> _schema)) {
			return false;
		}
		$keys = array();
		foreach ($this->_schema as $key => $value) {
			$value += $this -> getFieldOptionsDefaults();

			if ($value['primary_key']) {
				$keys[$key] = (!empty($this -> _collection -> $key)) ? $value['default'] : $this -> _collection -> $key;
			}
		}
		if (!empty($keys)) {
			$conditions = array('conditions' => $keys);
			$this -> first($conditions);
			return true;
		}

		return false;
	}//end sync

	public function error($error_name) {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $error_name);

		$error_name = self::_applyFilter(get_class(), __FUNCTION__, $error_name, array('event' => 'args'));
		$error_name = self::_applyFilter(get_called_class(), __FUNCTION__, $error_name, array('event' => 'args'));

		if (isset($this -> registry -> errors[$error_name])) {
			foreach ($this->registry->errors[$error_name] as $error) {
				echo $error;
			}//end foreach
		}

	}//endError

	private function getModelDefaults() {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__);

		$defaults = array();

		if (isset($this -> _schema)) {
			foreach ($this->_schema as $key => $value) {
				$defaults[$key] = (isset($this -> data -> $key)) ? $this -> data -> $key : @$value['default'];
			}
		}
		return $defaults;
	}//end

	private function getFieldOptionsDefaults() {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__);

		$defaults = array('primary_key' => false, 'unique' => false, 'type' => 'string', 'auto_increment' => false, 'default' => '');

		return $defaults;
	}

	private function formTableName($name) {

		if (self::_hasAdapter(get_called_class(), __FUNCTION__))
			return self::_callAdapter(get_called_class(), __FUNCTION__, $name);

		$name = self::_applyFilter(get_class(), __FUNCTION__, $name, array('event' => 'args'));
		$name = self::_applyFilter(get_called_class(), __FUNCTION__, $name, array('event' => 'args'));

		preg_match_all('/[A-Z][^A-Z]*/', $name, $results);
		$table = '';
		foreach ($results[0] as $key => $part) {
			if ($key == 0)
				$table .= strtolower($part);
			else
				$table .= '_' . strtolower($part);
		}

		return $table;
	}

	protected function _checkEvent($assigned_event, $check_event) {

	}

	protected function _configureConnection($options) {

		if ($this -> _config['storage'] == 'gridFS')
			$options['gridFS'] = true;

		return $options;
	}

	private function convertToPVStandardSearchQuery($data) {
		$args = array();
		if (isset($data['conditions'])) {
			foreach ($data['conditions'] as $key => $value) {
				if (is_array($value)) {
					$string = '';
					foreach ($value as $subkey => $subvalue) {
						$subkey = strtolower($subkey);
						//if($subkey=='or')

					}//end 2nd foreach
				} else {
					$args[$key] = $value;
				}
			}//end foreach
		}

	}

}
?>
