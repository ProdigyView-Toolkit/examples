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

//Add a connection to the database class
Database::addConnection('connection1', array(
	'dbhost' => 'mysql',
	'dbname' => 'prodigyview',
	'dbuser' => 'prodigyview',
	'dbpass' => 'prodigyview',
	'dbtype' => 'mysql',
	'dbschema' => '',
	'dbport' => '', 	
	'dbprefix' => 'pv_1_'
));

Database::addConnection('connection2', array(
	'dbhost' => 'postgres',
	'dbname' => 'prodigyview',
	'dbuser' => 'prodigyview',
	'dbpass' => 'prodigyview',
	'dbtype' => 'postgresql',
	'dbschema' => '',
	'dbport' => '', 	
	'dbprefix' => 'pv_2_'
));

//Set Connection to Mysql
Database::setDatabase('connection1');

//Get the random operator that is specific to the database being used
$random = Database::getSQLRandomOperator();
$query = 'SELECT * FROM TABLE_A ORDER BY '.$random;
echo $query;
echo '<br />';

//Get the average from a select statement
$avg = Database::dbAverageFunction('id');
$query = 'SELECT '.$avg.' FROM TABLE_A GROUP BY age';
echo $query;
echo '<br />';

//Retrieve the current database type that is connection
$type = Database::getDatabaseType();
echo $type;
echo '<br />';

//Retrieve the current schema, if any. Schemas are commonly used with postgresql and db2
$schema = Database::getSchema();
echo $schema;
echo '<br />';

$table = 'temptable';
$table_formated = Database::formatTableName($table);
echo $table_formated;
echo '<br /><br /><br />';

//Change to the PostgreSQL Database
Database::setDatabase('connection2');

//Get the random operator that is specific to the database being used
$random = Database::getSQLRandomOperator();
$query = 'SELECT * FROM TABLE_A ORDER BY '.$random;
echo $query;
echo '<br />';

//Get the average from a select statement
$avg = Database::dbAverageFunction('id');
$query = 'SELECT '.$avg.' FROM TABLE_A GROUP BY age';
echo $query;
echo '<br />';

//Retrieve the current database type that is connection
$type = Database::getDatabaseType();
echo $type;
echo '<br />';

//Retrieve the current schema, if any. Schemas are commonly used with postgresql and db2
$schema = Database::getSchema();
echo $schema;
echo '<br />';

$table = 'temptable';
$table_formated = Database::formatTableName($table);
echo $table_formated;
echo '<br />';

/**
 * Requries a live connection and a real table. Pagination offset can performaned using this function below.
 * 
 * Database::getPagininationOffset($table, $join_clause = '', $where_clause = '', $current_page = 0, $results_per_page = 20, $order_by = '')
 */
