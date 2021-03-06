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
//This connections are set in your Docker instance
$connection = array(
	'dbhost' => 'mysql', 	//host
	'dbname' => 'prodigyview', 		//database name
	'dbuser' => 'prodigyview', 		//user
	'dbpass' => 'prodigyview', 	//user's password
	'dbtype' => 'mysql', 		//database type
	'dbschema' => '', 			//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => 'pv_'			//table prefix(optional)
);
//Add a connection to the database class
Database::addConnection('connection1', $connection);

//Connect to the database using a connection
Database::setDatabase('connection1');

//Set up the information for creating a table.
$options = array('primary_key' => 'id');
$columns = array('id' => array('type' => 'int', 'auto_increment' => true), 'name' => array('type' => 'string', 'precision' => 200, 'default' => '\'\''), 'description' => array('type' => 'text'), 'is_active' => array('type' => 'boolean', 'default' => 0), 'date' => array('type' => 'timestamp'), );

//Check if Table Exist
//Create table if it does not
if (!Database::tableExist('test_table')) {
	Database::createTable('test_table', $columns, $options);
}

//Sanitize Information
$name = Database::makeSafe('John Doe');
$description = Database::makeSafe('John\'s Doe descriptn is * and nothing.');
//Create Query
$query = "INSERT INTO test_table(name, description) VALUES ('$name', '$description')";
//Execute Insert Query
Database::query($query);

//Sanitize Information
$name = Database::makeSafe('* or nothing injection');
$description = Database::makeSafe('\'" & request("name") & "\'"');
//Create Query
$query = "INSERT INTO test_table(name, description) VALUES ('$name', '$description')";
//Execute Insert Query And Get the ID
$id = Database::return_last_insert_query($query, 'id', 'test_table');

echo '<p>Last returned ID: ' . $id . '</p>';

$query = 'SELECT * FROM test_table';
$result = Database::query($query);

$row_count = Database::resultRowCount($result);

echo '<p>Number Of Rows: ' . $row_count . '</p>';
?>
<p>
	The number of rows are: <?php echo $row_count;?>
</p>
<?php

while ($row = Database::fetchArray($result)) {
	echo $row['id'];
	$query = "DELETE FROM test_table WHERE id=" . $row['id'];
	Database::query($query);
}
?>