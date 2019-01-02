<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');


//Add a connection to the database
Database::addConnection('mydb', array(
	'dbhost' => 'mysql', 	//host
	'dbname' => 'prodigyview', 		//database name
	'dbuser' => 'prodigyview', 		//user
	'dbpass' => 'prodigyview', 	//user's password
	'dbtype' => 'mysql', 		//database type
	'dbschema' => '', 			//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => 'pv_'			//table prefix(optional)
));

//Connect to the database
Database::setDatabase('mydb');

/**
 * Create columns to add to a table.]
 * primary_key - Add if the column identifies as a primary key
 * auto_increment - Set if the column is auto incrementing in value
 * precision - Set the precision or number of fields a column has
 * type - The type of field to be added
 */
$columns = array(
 	'id' => array( 'auto_increment' => true, 'type' =>'int', 'primary_key' => true),
 	'handle' =>array('type'=>'string', 'precision' => 200, 'primary_key' => true),
 	'message' => array('type' => 'text'),
 	'has_read' => array('type' => 'boolean', 'default' => 0),
 	'date_received' => array('type' =>'timestamp')
 );
 
$executed_query ='';
//Set the table name
$table_name = 'messenger';

if(!Database::tableExist($table_name)) {
	$executed_query = Database::createTable($table_name, $columns, array('primary_key' => 'id, handle'));
}

//Query that was executed to create the table
echo $executed_query.'<br /><br />';

//Add A column to the table
$added_columns = array(
	'replied' => array('type' => 'boolean', 'default' => 0),
	'date_replied' => array('type' => 'date' )
);

if(Database::tableExist($table_name)) {
	foreach($added_columns as $column => $data) {
		$executed_query = Database::addColumn($table_name, $column, $data);
	} 
}

echo $executed_query.'<br /><br />';

//Clear or truncate a table of it's data
Database::clearTableData($table_name);

//Drop A column from the table, if the table exist
if(Database::columnExist($table_name, 'date_replied')){
	Database::dropColumn($table_name, 'date_replied');
}

//Drap the entire table
if(Database::tableExist($table_name)) { 
	Database::dropTable($table_name);
}

