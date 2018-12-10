<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo PVHTML::h1('Code Example + Output');
echo PVHTML::p('Code will be at the beginning, with example output below.');

echo PVHtml::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo PVHtml::h3('Output From Code');

//Add a connection to the database class
PVDatabase::addConnection('connection1', array(
	'dbhost' => 'mysql',
	'dbname' => 'prodigyview',
	'dbuser' => 'prodigyview',
	'dbpass' => 'prodigyview',
	'dbtype' => 'mysql',
	'dbschema' => '',
	'dbport' => '', 	
	'dbprefix' => 'pv_1_'
));

PVDatabase::addConnection('connection2', array(
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
PVDatabase::setDatabase('connection1');

//Get the random operator that is specific to the database being used
$random = PVDatabase::getSQLRandomOperator();
$query = 'SELECT * FROM TABLE_A ORDER BY '.$random;
echo $query;
echo '<br />';

//Get the average from a select statement
$avg = PVDatabase::dbAverageFunction('id');
$query = 'SELECT '.$avg.' FROM TABLE_A GROUP BY age';
echo $query;
echo '<br />';

//Retrieve the current database type that is connection
$type = PVDatabase::getDatabaseType();
echo $type;
echo '<br />';

//Retrieve the current schema, if any. Schemas are commonly used with postgresql and db2
$schema = PVDatabase::getSchema();
echo $schema;
echo '<br />';

$table = 'temptable';
$table_formated = PVDatabase::formatTableName($table);
echo $table_formated;
echo '<br /><br /><br />';

//Change to the PostgreSQL Database
PVDatabase::setDatabase('connection2');

//Get the random operator that is specific to the database being used
$random = PVDatabase::getSQLRandomOperator();
$query = 'SELECT * FROM TABLE_A ORDER BY '.$random;
echo $query;
echo '<br />';

//Get the average from a select statement
$avg = PVDatabase::dbAverageFunction('id');
$query = 'SELECT '.$avg.' FROM TABLE_A GROUP BY age';
echo $query;
echo '<br />';

//Retrieve the current database type that is connection
$type = PVDatabase::getDatabaseType();
echo $type;
echo '<br />';

//Retrieve the current schema, if any. Schemas are commonly used with postgresql and db2
$schema = PVDatabase::getSchema();
echo $schema;
echo '<br />';

$table = 'temptable';
$table_formated = PVDatabase::formatTableName($table);
echo $table_formated;
echo '<br />';

/**
 * Requries a live connection and a real table. Pagination offset can performaned using this function below.
 * 
 * PVDatabase::getPagininationOffset($table, $join_clause = '', $where_clause = '', $current_page = 0, $results_per_page = 20, $order_by = '')
 */
