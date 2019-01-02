<?php
	/**
	 * The file should only contain the database configuration. Please not that you can
	 * define multiple database connections each and they will be loaded automatically
	 * at run time. Connections can also be added manually by using the Database::add()
	 * function.
	 * 
	 * dbhost - The host or ip the database is on
	 * dbuser - The username to connected to the database
	 * dbpass - The password the user uses to connect to the database
	 * dbtype - The type of database. Options are mysql - postgresql -mssql
	 * dbname - The name of the database on the host
	 * dbport - Optional. The port that is used to connect to the database
	 * dbschema - Optional. The schema the database is on (generally used in PostgreSQL)
	 * dbprefix - Optional. A prefix that will be placed in front of every table.
	 * 
	 * Sample
	 * 
	 * $connections['connection_1']['dbhost']='xxx.xxxx.xxx';
	 * $connections['connection_1']['dbuser']='auser';
	 * $connections['connection_1']['dbpass']='apassword';
	 * $connections['connection_1']['dbtype']='mysql';
	 * $connections['connection_1']['dbname']='databasename';
	 * $connections['connection_1']['dbport']='';
	 * $connections['connection_1']['dbschema']='aschema';
	 * $connections['connection_1']['dbprefix']='pv_';
	 */
	
	$connections[0]['dbhost']='xxx.xxx.xxx';
	$connections[0]['dbuser']='auser';
	$connections[0]['dbpass']='apassword';
	$connections[0]['dbtype']='mysql';
	$connections[0]['dbname']='db1';
	$connections[0]['dbport']='';
	$connections[0]['dbschema']='';
	$connections[0]['dbprefix']='pv_';
	
	$connections[1]['dbhost']='localhost';
	$connections[1]['dbuser']='auser2';
	$connections[1]['dbpass']='apassword2';
	$connections[1]['dbtype']='postgresql';
	$connections[1]['dbname']='db2';
	$connections[1]['dbport']='5432';
	$connections[1]['dbschema']='pvtest';
	$connections[1]['dbprefix']='pg_';
	
?>