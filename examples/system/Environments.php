<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_classLoader.php');

//Create a production and development database connection
$database_production = array(
	'dbhost' => 'localhost', 	//host
	'dbname' => 'adbname', 		//database name
	'dbuser' => 'adbuser', 		//user
	'dbpass' => 'adbpassword', 	//user's password
	'dbtype' => 'mysql', 		//database type
	'dbschema' => '', 			//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => 'pv_'			//table prefix(optional)
);

$database_development = array(
	'dbhost' => '192.168.1.0', 	//host
	'dbname' => 'anotherdb', 	//database name
	'dbuser' => 'dbuser2', 		//user
	'dbpass' => 'dbpassword2', 	//user's password
	'dbtype' => 'postgresql', 	//database type
	'dbschema' => 'test', 		//schema(optional)
	'dbport' => '', 			//port(optional)
	'dbprefix' => 'he_'			//table prefix(optional)
);

//Add the connections and assign them an environemnt
PVConfiguration::addConfiguration('database', $database_production, array('environment' => 'production'));

PVConfiguration::addConfiguration('database', $database_development , array('environment' => 'development'));

//Retrieve the configuration based on the enviroment
$db_config = PVConfiguration::getConfiguration('database', array('environment' => 'production'));
print_r($db_config).'<br />';

$db_config = PVConfiguration::getConfiguration('database', array('environment' => 'development'));
print_r($db_config).'<br />';


//Set An Environment variable based on a server configuration
if($_SERVER['HTTP_HOST']=='production')
	$environment = 'production';
else 
	$environment = 'development';

//Set the Environment based on the information retrieved from the server variable
PVConfiguration::init(array('environment' => $environment));

//Will retrieve the the data based on the environemnt set in the init
$db_config = PVConfiguration::getConfiguration('database');
print_r($db_config).'<br />';

