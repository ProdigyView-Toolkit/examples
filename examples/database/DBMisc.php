<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

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
