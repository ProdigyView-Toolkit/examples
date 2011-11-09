<?php
//Include the DEFINES and include only the components. This will allow you to explicity 
//change the boot configuration to set your to fit your needs. Rememeber to not initialize
// the database or load the plugins.
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCoreComponents.php');
PVBootstrap::bootSystem(array('initialize_database'=>false, 'load_plugins'=>false));

//Add a connection, replace with your creditentials.
$connection=array(
	'dbhost'=>'localhost',		//host
	'dbname'=>'adbname',		//database name
	'dbuser'=>'adbuser',		//user
	'dbpass'=>'adbpassword',	//user's password
	'dbtype'=>'mysql',			//database type
	'dbschema'=>'',				//schema(optional)
	'dbport'=>'',				//port(optional)
	'dbprefix'=>'pv_'			//table prefix(optional)
);
//Add a connection to the database class
PVDatabase::addConnection('connection1', $connection);

//Connect to the database using a connection
PVDatabase::setDatabase('connection1');

//Set up the information for creating a table.
$options=array( 'primary_key'=>'id');
$columns=array(
	'id'=>array('type'=>'int', 'auto_increment'=>true),
	'name'=>array('type'=>'string', 'precision'=>200, 'default'=>'\'\''),
	'description'=>array('type'=>'text',  'default'=>'\'\''),
	'is_active'=>array('type'=>'boolean',  'default'=>0),
	'date'=>array('type'=>'timestamp', 'default'=>'current_timestamp'),
);

//Check if Table Exist
//Create table if it does not
if(!PVDatabase::tableExist('test_table')){
	PVDatabase::createTable('test_table', $columns, $options);
}

//Sanitize Information
$name=PVDatabase::makeSafe('John Doe');
$description=PVDatabase::makeSafe('John\'s Doe descriptn is * and nothing.');
//Create Query
$query="INSERT INTO test_table(name, description) VALUES ('$name', '$description')";
//Execute Insert Query
PVDatabase::query($query);

//Sanitize Information
$name=PVDatabase::makeSafe('* or nothing injection');
$description=PVDatabase::makeSafe('\'" & request("name") & "\'"');
//Create Query
$query="INSERT INTO test_table(name, description) VALUES ('$name', '$description')";
//Execute Insert Query And Get the ID
$id=PVDatabase::return_last_insert_query($query, 'id', 'test_table');

echo '<p>Last returned ID: '.$id.'</p>';

$query='SELECT * FROM test_table';
$result=PVDatabase::query($query);

$row_count=PVDatabase::resultRowCount($result);

echo '<p>Number Of Rows: '.$row_count.'</p>';

?>
<p>The number of rows are: <?php echo $row_count;?></p>
<?php

while($row=PVDatabase::fetchArray($result)) {
	echo $row['id'];
	$query="DELETE FROM test_table WHERE id=".$row['id'];
	PVDatabase::query($query);
}

?>