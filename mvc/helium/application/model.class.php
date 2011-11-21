<?php

Abstract Class Model extends PVObject {
		
	protected $registry;
	protected $errors;
	protected $config=array(
		'create_table'=>true,
		'column_check'=>true
	);

	function __construct($registry=null) {
		if ($registry==null)
			$this->registry=new PVCollection();
		else
			$this->registry = $registry;
		
	}
	
	protected function checkSchema() {
		$table_name=$this->formTableName(get_class($this));
		$tablename=PVDatabase::formatTableName(strtolower($table_name));
		
		if(!PVDatabase::tableExist($tablename) && isset($this->schema) && $this->config['create_table']){
			$primary_keys='';
			$first=1;
			$schema=$this->schema;
				
			foreach($schema as $key => $value) {
				if(isset($value['primary_key'])){
					$primary_keys.=(!$first) ? ','.$key : $key;
					$first=0;
				} else if(isset($value['default']) && empty($value['default']) &&  !($value['default']===0)){
					$schema[$key]['default']='\'\'';
				}
			}//endforeach
			
			$options=array('primary_key'=>$primary_keys);
			PVDatabase::createTable($tablename, $schema ,$options);
		} else if(isset($this->schema) && $this->config['column_check']) {
			$schema=$this->schema;
			
			foreach($schema as $key => $value) {
				if(!PVDatabase::columnExist($tablename, $key)){
					if(isset($value['default']) && empty($value['default']) &&  !($value['default']===0))
						$value['default']='\'\'';
					
					PVDatabase::addColumn($tablename, $key, $value);
				}
			}//end foreach
		}
	}//end checkSchema
	
	protected function validate($data){
		
		$hasError=true;
		$this->errors=array();
		
		if(!empty($this->validators)){
			
			foreach($this->validators as $field=>$rules){
				
				foreach($rules as $key=>$rule){
					
					if(!PVValidator::check($key,$data[$field])){
						$hasError=false;
						$this->errors[$field][]=$rule['error'];
					}
					
				}//end second foreach
			}//end foreach
				
		}//end validators
		
		$this->registry->errors=$this->errors;
		
		return $hasError;
	}//end validate
	
	public function create($data) {
		$this->checkSchema();
		
		if($this->validate($data)) {
			$table_name=$this->formTableName(get_class($this));
			$table_name=PVDatabase::formatTableName(strtolower($table_name));
			$defaults=$this->getModelDefaults();
			$data += $defaults;
			
			$input_data=array();
			$primary_keys=array();
			$auto_incremented_field='';
			
			foreach($this->schema as $field => $field_options){
				$field_options += $this->getFieldOptionsDefaults();
				$input_data[$field]=(empty($data[$field])) ? $field_options['default'] : $data[$field];
				
				if($field_options['primary_key']==true && !$field_options['auto_increment']){
					$primary_keys[$field]=$input_data[$field];
				}
				
				if($field_options['auto_increment']==true){
					$auto_incremented_field=$field;
				}
				
				if($field_options['unique']==true){
					//$primary_key=$field;
				}
				
			}//end foreach
			
			$id=PVDatabase::preparedReturnLastInsert($table_name, $auto_incremented_field, $table_name,  $input_data );
			
			if($id) {
				$conditions=array(
					'conditions'=>array($auto_incremented_field=>$id
					)
				);
				
				$this->first($conditions);
				return true;
			}
		}
		
		return false;
	}
	
	public function update($data, $conditions = array()) {
		
		if($this->validate($data)) {
			$table_name=$this->formTableName(get_class($this));
			$table_name=PVDatabase::formatTableName($table_name);
			$defaults=$this->getModelDefaults();
			$data += $defaults;
			
			$input_data=array();
			$primary_key='';
			$wherelist=array();	
			
			foreach($this->schema as $field => $field_options) {
				$field_options += $this->getFieldOptionsDefaults();
				if($field_options['primary_key']){
					$primary_key=$field;
					$wherelist[$field]=(!empty($this->_collection->$field)) ? $field_options['default'] : $this->_collection->$field;
				} 
				
				$input_data[$field]=(empty($data[$field])) ? $field_options['default'] : $data[$field];
					
			}//end foreach
			
			$result=PVDatabase::preparedUpdate($table_name, $input_data, $wherelist);
			
			$this->addToCollection($input_data);
			
			$this->sync();
			
			return $result;
		}

		return false;
	}//end update
	
	public function delete($data) {
		$table_name=$this->formTableName(get_class($this));
		$table_name=PVDatabase::formatTableName(strtolower($table_name));
		
		return PVDatabase::preparedDelete($table_name, $data, $whereformats='');
	}//end delete
	
	public function first($conditions=array()){
		$this->checkSchema();
		
		$defaults=array(
			'conditions'=>array()
		);
		$conditions += $defaults;
		$table_name=$this->formTableName(get_class($this));
		$table_name=PVDatabase::formatTableName(strtolower($table_name));
		$input_data=array();
		$query='SELECT * FROM '.$table_name.' ';
		
		if(isset($conditions['join']) && isset($this->joins)) {
			foreach($conditions['join'] as $join) {
					
				if(isset($this->joins[$join]))
					$query.=$this->joinTable($this->joins[$join]).' ';
				
			}//end foreach
		}
		
		$WHERE_CLAUSE='';
		$first=true;
		foreach($conditions['conditions'] as $key=>$condition){
				if(is_array($condition)){
					
				} else {
					if($first)
						$WHERE_CLAUSE.=$key.'=?';
					else 
						$WHERE_CLAUSE.=' AND '.$key.'=?';
					
					$input_data[$key]=$condition;
					$first=false;
				}
		}//end foreach
		
		if(!empty($WHERE_CLAUSE)){
			$query.='WHERE '.$WHERE_CLAUSE.' ';
		}
	
		$query.='LIMIT 1';
		
		$result=PVDatabase::preparedSelect($query, $input_data, $formats='');
		$row=PVDatabase::fetchArray($result);
		foreach($row as $key=>$value) {
			if(!PVValidator::isInteger($key))
				$this->addToCollectionWithName($key, $value);
		}
	}
	
	public function find($conditions=array()){
		$this->checkSchema();
		
		$table_name=$this->formTableName(get_class($this));
		$table_name=PVDatabase::formatTableName(strtolower($table_name));
		$input_data=array();
		$query='SELECT * FROM '.$table_name.' ';
		
		if(isset($conditions['join']) && isset($this->joins)) {
			foreach($conditions['join'] as $join) {
					
				if(isset($this->joins[$join]))
					$query.=$this->joinTable($this->joins[$join]).' ';
				
			}//end foreach
		}
		
		$WHERE_CLAUSE='';
		$first=true;
		if(isset($conditions['conditions'])) {
			foreach($conditions['conditions'] as $key=>$condition){
					if(is_array($condition)){
						
					} else {
						if($first)
							$WHERE_CLAUSE.=$key.'=?';
						else 
							$WHERE_CLAUSE.=' AND '.$key.'=?';
						
						$input_data[$key]=$condition;
						$first=false;
					}
			}//end foreach
			
			if(!empty($WHERE_CLAUSE)){
				$query.='WHERE '.$WHERE_CLAUSE.' ';
			}
		}
		
		$result=PVDatabase::preparedSelect($query, $input_data);
		$rows=PVDatabase::fetchFields($result);

		foreach($rows as $row) {
			$this->addToCollection($row);
		}
		
		
	}
	
	protected function joinTable($args=array()) {
		$defaults=array(
			'type'=>'natural',
			'alias'=>'',
			'on'=>'',
			'format_table'=>true
		);
		
		$args += $defaults;
		
		$table=($args['format_table']) ? PVDatabase::formatTableName(strtolower($args['table'])) : $args['table'];
		
		switch(strtolower($args['type'])):
			case 'left':
				$join='LEFT JOIN';
				break;
			case 'right':
				$join='RIGHT JOIN';
				break;
			case 'join':
				$join='JOIN';
				break;
			case 'full':
				$join='FULL JOIN';
				break;
			default:
				$join='NATURAL JOIN';
		endswitch;
		
		$join.=' '.$table;
		
		if(!empty($args['alias']))
			$join.=' AS '.$args['alias'];
		
		if(!empty($args['on']))
			$join.=' ON '.$args['on'];
		
		return $join;
	}
	
	public function sync() {
		if(!isset($this->schema)) {
			return false;	
		}
		$keys=array();
		foreach($this->schema as $key => $value) {
			$value += $this->getFieldOptionsDefaults();
			
			if($value['primary_key']) {
				$keys[$key]=(!empty($this->_collection->$key)) ? $value['default'] : $this->_collection->$key;
			}
		}
		if(!empty($keys)) {
			$conditions=array('conditions'=>$keys);	
			$this->first($conditions);
			return true;
		}
		
		return false;
	}//end sync
	
	private function getModelDefaults() {
		$defaults=array();
		
		if(isset($this->schema)) {
			foreach($this->schema as $key => $value) {
				$defaults[$key]=(isset($this->data->$key))? $this->data->$key: @$value['default'];
			}
		}
		return $defaults;
	}//end 
	
	
	private function getFieldOptionsDefaults() {
		$defaults=array(
			'primary_key'=>false,
			'unique'=>false,
			'type'=>'string',
			'auto_increment'=>false,
			'default'=>''
		);
		
		return $defaults;
	}

	private function formTableName($name) {
		preg_match_all('/[A-Z][^A-Z]*/',$name ,$results);
		$table='';
		foreach($results[0] as $key=>$part){
			if($key==0)
				$table.=strtolower($part);
			else 
				$table.='_'.strtolower($part);
		}
		
		return $table;
	}

	private function convertToPVStandardSearchQuery($data) {
		$args=array();
		if(isset($data['conditions'])){
			foreach($data['conditions'] as $key=>$value){
				if(is_array($value)) {
					$string='';
					foreach($value as $subkey=>$subvalue){
						$subkey=strtolower($subkey);
						//if($subkey=='or')
					
					}//end 2nd foreach
				} else {
					$args[$key]=$value;
				}
			}//end foreach
		}
		
	}
	
	
}
	?>
	