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

//Create A connection to postgresql
//Uses the connection in the docker config
Database::addConnection('connection', array(
	'dbhost' => 'postgres', 	//host
	'dbname' => 'prodigyview', 		//database name
	'dbuser' => 'prodigyview', 		//user
	'dbpass' => 'prodigyview', 	//user's password
	'dbtype' => 'postgresql', 		//database type
	'dbschema' => '', 			//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => ''			//table prefix(optional)
));

//Connect to the database using a connection
Database::setDatabase('connection');

//Set up the information for creating a table.
$options = array('primary_key' => 'record_id');
$columns = array(
		'record_id' => array('type' => 'serial', 'auto_increment' => true, 'primary_key'  => true), 
		'user_id' => array('type' => 'int'), 
		'browser_name' => array('type' => 'string', 'precision' => 20, 'default' => '\'\''), 
		'referred_page' => array('type' => 'string', 'precision' => 300, 'default' => '\'\''),
		'browser_language' => array('type' => 'string', 'precision' => 5, 'default' => '\'\''),
		'date_recorded' => array('type' => 'datetime', 'default' => 'now()'), 
		'user_ip' => array('type' => 'ip')
);

//Check if Table Exist
$table = 'sessions';

//Create table if it does not
if (!Database::tableExist($table)) {
	Database::createTable($table, $columns, $options);
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Prepared SQL Statements Example</title>
	</head>
	<body>
		<?php $data = array(
			'user_ip' => $_SERVER['REMOTE_ADDR'],
			'user_id' => 3,
			'browser_name' => 'Firefox'
		);
		?>
		<h1>Prepared Insert</h1>
		<p>
			Creating a prepared statement.
		</p>
		<?php $id = Database::preparedReturnLastInsert($table, 'record_id', $table, $data); ?>
		<p>
			Result of prepared statement <?php echo $id; ?>
		</p>
		<h2>Prepared Select</h2>
		<?php $query = 'SELECT * FROM ' . $table . ' WHERE user_id=' . Database::getPreparedPlaceHolder(1);
		$data = array('user_id' => 3);
		$result = Database::preparedSelect($query, $data);
		?>
		<p>
			Row Count: <?php echo Database::resultRowCount($result); ?>
		</p>
		<p>
			Return a row
		</p>
		<?php $row = Database::fetchArray($result); ?>
		<pre><?php print_r($row); ?></pre>
		?> <h2>Update the Row</h2>
		<?php $data = array(
			'referred_page' => 'http://www.prodigyview.com',
			'browser_language' => 'eng'
		);
		$wherelist = array('record_id' => $row['record_id']);
		?>
		<pre><?php echo print_r($data); ?></pre>
		<pre><?php echo print_r($wherelist); ?></pre>
		<?php Database::preparedUpdate($table, $data, $wherelist); ?>
		<p>
			Row has be succesffuly update
		</p>
		<h2>Delete Row</h2>
		<?php
		Database::preparedDelete($table, $wherelist);
		?>
		<p>
			Row has been succesfully deleted.
		</p>
	</body>
</html>
