<?php
//Include the DEFINES and boo the system
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

use prodigyview\template\Html;
use prodigyview\system\Database;

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

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

if(Database::getDatabaseType() != 'mongo' && !Database::tableExist($table_name)) {
	$executed_query = Database::createTable($table_name, $columns, array('primary_key' => 'id, handle'));
}

$insert = array(
	'handle' => 'sammy',
	'message' => 'How are you doing today?',
	'has_read' => false
);

Database::insertStatement($table_name, $insert);
echo '<br />';

$select = array(
	'where' => array(
		'handle' => 'test_handle',
		'has_read' => array('Yes', array('OR' => 'Maybe')), 
		'id'=> array('>=' => 5)
	),
	'table' => $table_name
);

Database::selectStatement($select);
echo '<br />';

$update_feilds = array(
	'has_read' => '0'
);

$update_where = array(
	'has_read' => '1'
);
Database::updateStatement($table_name, $update_feilds, $update_where );
