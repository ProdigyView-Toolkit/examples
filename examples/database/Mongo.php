<?php
//Include the DEFINES and include only the classloader. This will allow you to explicity
//change the boot configuration to set your to fit your needs. Rememeber to not initialize
// the database or load the plugins.
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');
PVBootstrap::bootSystem(array('initialize_database' => false, 'load_plugins' => false, 'load_database' => false));

//Add a connection, replace with your creditentials.
$connection = array(
	'dbhost' => 'localhost', 	//host
	'dbname' => 'adbname', 		//database name
	'dbuser' => 'adbuser', 		//user
	'dbpass' => 'adbpassword', 	//user's password
	'dbtype' => 'mongo', 		//To connect to mongodb, set the type as 'mongo'
	'dbschema' => '', 			//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => ''			//table prefix(optional)
);

//Add a connection to the database class
PVDatabase::addConnection('mongo_connection', $connection);

//Connect to the database using a connection
PVDatabase::setDatabase('mongo_connection');

//Set the table name
$table_name = 'messenger';

//Data is inserted into Mongo in an array format
$insert = array(
	'handle' => 'sammy',
	'message' => 'How are you doing today?',
	'has_read' => false
);

//Insert data into table and return MongoID
$id = PVDatabase::insertStatement($table_name, $insert);

echo PVHtml::p( 'Returned ID: '. $id);

//For a batch insert, insert data into array at different indexes
$batch_insert[] = array( 'handle' => 'steve', 'message' => 'Fine, thanks?', 'has_read' => '0' );
$batch_insert[] = array( 'handle' => 'sarah', 'message' => 'I need to contact support', 'has_read' => '1' );
$batch_insert[] = array( 'handle' => 'susan', 'message' => 'Send letter to HR', 'has_read' => '2' );

//Insert the data into the database and set the option batchInsert to true
PVDatabase::insertStatement($table_name, $batch_insert, array('batchInsert' => true));


$select = array(
	'where' => array('handle' => 'sammy'),
	'fields' => array('handle', 'has_read'),
	'table' => $table_name
);

$result = PVDatabase::selectStatement($select);

echo PVHtml::h1('Find Results From Select Statement');
foreach($result as $key => $value) {
	print_r($value);
}

$select = array(
	'where' => array('_id' => new MongoID($id)),
	'table' => $table_name
);

//Set the option to only find one and return that result
$result = PVDatabase::selectStatement($select, array('findOne' => true));

echo PVHtml::h1('Find Only One Result');
print_r($result);
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
PVDatabase::updateStatement($table_name, $update_feilds, $update_where );

//Delete using values by defining arguements in an array
$result = PVDatabase::deleteStatement(array('has_read' => 0));
