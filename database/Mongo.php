<?php
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

//Add a connection, replace with your creditentials.
$connection = array(
	'dbhost' => 'mongodb', 	//host
	'dbname' => 'prodigyview', 		//database name
	'dbuser' => 'prodigyview', 		//user
	'dbpass' => 'prodigyview', 	//user's password
	'dbtype' => 'mongo', 		//To connect to mongodb, set the type as 'mongo'
	'dbschema' => '', 			//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => ''			//table prefix(optional)
);

//Add a connection to the database class
Database::addConnection('mongo_connection', $connection);

//Connect to the database using a connection
Database::setDatabase('mongo_connection');

//Set the table name
$table_name = 'messenger';

//Data is inserted into Mongo in an array format
$insert = array(
	'handle' => 'sammy',
	'message' => 'How are you doing today?',
	'has_read' => false
);

//Insert data into table and return MongoID
$id = Database::preparedReturnLastInsert($table_name,'','', $insert);

echo Html::p( 'Returned ID: '. $id);

//For a batch insert, insert data into array at different indexes
$batch_insert[] = array( 'handle' => 'steve', 'message' => 'Fine, thanks?', 'has_read' => '0' );
$batch_insert[] = array( 'handle' => 'sarah', 'message' => 'I need to contact support', 'has_read' => '1' );
$batch_insert[] = array( 'handle' => 'susan', 'message' => 'Send letter to HR', 'has_read' => '2' );

//Insert the data into the database and set the option batchInsert to true
Database::preparedReturnLastInsert($table_name,'','', $batch_insert, array('batchInsert' => true));


$select = array(
	'where' => array('handle' => 'sammy'),
	'fields' => array('handle', 'has_read'),
	'table' => $table_name
);

$result = Database::selectStatement($select);

echo Html::h1('Find Results From Select Statement');
echo '<pre>';
foreach($result as $key => $value) {
	print_r($value);
}
echo '</pre>';

$select = array(
	'where' => array('_id' => new MongoDB\BSON\ObjectID($id)),
	'table' => $table_name
);

//Set the option to only find one and return that result
$result = Database::selectStatement($select, array('findOne' => true));

echo Html::h1('Find Only One Result');
echo '<pre>';
print_r($result);
echo '</pre>';
echo '<br />';

//The new value of the field(s)
$update_feilds = array(
	'has_read' => '1'
);

//Where to search to find the values to update
$update_where = array(
	'has_read' => '0'
);

//Update the collection
Database::updateStatement($table_name, $update_feilds, $update_where );

//Delete using values by defining arguements in an array
$result = Database::deleteStatement(array(
	'table' => $table_name,
	'where' => array('has_read' => 0)
));
