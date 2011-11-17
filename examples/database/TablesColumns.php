<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

/**
 * Create columns to add to a table.]
 * primary_key - Add if the column identifies as a primary key
 * auto_increment - Set if the column is auto incrementing in value
 * precision - Set the precision or number of fields a column has
 * type - The type of field to be added
 */
$columns = array(
 	'id' => array( 'auto_increment' => true, 'type' =>'int'),
 	'handle' =>array('type'=>'string', 'precision' => 200),
 	'message' => array('type' => 'text', 'default' => "''"),
 	'has_read' => array('type' => 'boolean', 'default' => 0),
 	'date_received' => array('type' =>'timestamp', 'default' => 'now()')
 );
 
$executed_query ='';
//Set the table name
$table_name = 'messenger';

if(!PVDatabase::tableExist($table_name)) {
	$executed_query = PVDatabase::createTable($table_name, $columns, array('primary_key' => 'id, handle'));
}

//Query that was executed to create the table
echo $executed_query.'<br /><br />';

//Add A column to the table
$added_columns = array(
	'replied' => array('type' => 'boolean', 'default' => 0),
	'date_replied' => array('type' => 'date' )
);

if(PVDatabase::tableExist($table_name)) {
	foreach($added_columns as $column => $data) {
		$executed_query = PVDatabase::addColumn($table_name, $column, $data);
	} 
}

echo $executed_query.'<br /><br />';

//Clear or truncate a table of it's data
PVDatabase::clearTableData($table_name);

//Drop A column from the table, if the table exist
if(PVDatabase::columnExist($table_name, 'date_replied')){
	PVDatabase::dropColumn($table_name, 'date_replied');
}

//Drap the entire table
if(PVDatabase::tableExist($table_name)) { 
	PVDatabase::dropTable($table_name);
}

