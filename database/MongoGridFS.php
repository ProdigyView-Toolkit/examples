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
$table_name = 'images';

//Set the location of the images
$image_location = PV_ROOT . '/examples/content/example_files/sample_image_1.jpg';

$image_location_2 = PV_ROOT . '/examples/content/example_files/sample_image_2.jpg';

//Data is inserted into Mongo in an array format
$insert = array(
	'name' => 'Sample Image',
	'mime_type' => PVFileManager::getFileMimeType($image_location),
	'file_size' => filesize($image_location)
);

//Set the options for storing the file into GridFS
$options = array(	
	'gridFS' => TRUE,			//Set true to use the grid
	'file' => $image_location	//Set the location of the file to store
);

//Insert data into gridFS and return MongoID
$id = PVDatabase::insertStatement($table_name, $insert, $options);
echo PVHtml::p('Return ID 1: ' . $id);

//Data is inserted into Mongo in an array format
$insert = array(
	'name' => 'Sample Image 2',
	'mime_type' => PVFileManager::getFileMimeType($image_location_2),
	'file_size' => filesize($image_location_2)
);

//Set the options for storing the file into GridFS
$options = array(	
	'gridFS' => TRUE,			//Set true to use the grid
	'file' => $image_location_2	//Set the location of the file to store
);

//Insert the data into the GridFS
$id_2 = PVDatabase::insertStatement($table_name, $insert, $options);
echo PVHtml::p( 'Return ID 2: '. $id_2);

//Set the options for finding multiple value passed on passed parameters
$select = array(
	'where' => array('mime_type' => PVFileManager::getFileMimeType($image_location_2)),
	'table' => $table_name
);

$result = PVDatabase::selectStatement($select, array('gridFS' => true));

echo PVHtml::h1('Files found in the GridFS');
foreach($result as $key => $value) {
	print_r($value);
}

//Find and retrieve only a single file store in GridFS
$select = array(
	'where' => array('_id' => new MongoID($id)),
	'table' => $table_name
);

$result = PVDatabase::selectStatement($select, array('gridFS' => true, 'findOne' => true));

echo PVHtml::h1('Returned Single File');
print_r($result);
echo '<br />';

//Write the image to a file and display
//Another method would be writing the bytes under a header tag
$image_bytes = $result -> getBytes();
PVFileManager::writeFile(PV_ROOT.PV_IMAGE.'gridfsimage.jpeg', $image_bytes);
echo PVHtml::image('gridfsimage.jpeg');

$update_feilds = array(
	'name' => 'Sample Image 3'
);

$update_where = array(
	'name' => 'Sample Image'
	
);
PVDatabase::updateStatement($table_name, $update_feilds, $update_where, array('gridFS' => true) );

$result = PVDatabase::deleteStatement($select, array('gridFS' => true));
