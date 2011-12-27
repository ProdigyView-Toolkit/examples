<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootMinusPlugins.php');

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

if(PVDatabase::getDatabaseType() != 'mongo' && !PVDatabase::tableExist($table_name)) {
	$executed_query = PVDatabase::createTable($table_name, $columns, array('primary_key' => 'id, handle'));
}

$insert = array(
	'handle' => 'sammy',
	'message' => 'How are you doing today?',
	'has_read' => false
);

PVDatabase::insertStatement($table_name, $insert);
echo '<br />';

$select = array(
	'where' => array(
		'handle' => 'test_handle',
		'has_read' => array('Yes', array('OR' => 'Maybe')), 
		'id'=> array('>=' => 5)
	),
	'table' => $table_name
);

PVDatabase::selectStatement($select);
echo '<br />';

$update_feilds = array(
	'has_read' => '0'
);

$update_where = array(
	'has_read' => '1'
);
PVDatabase::updateStatement($table_name, $update_feilds, $update_where );
