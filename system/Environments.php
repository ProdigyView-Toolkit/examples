<?php
//Include the DEFINES and boot the system
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

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
Configuration::addConfiguration('database', $database_production, array('environment' => 'production'));

Configuration::addConfiguration('database', $database_development , array('environment' => 'development'));

//Retrieve the configuration based on the enviroment
$db_config = Configuration::getConfiguration('database', array('environment' => 'production'));
print_r($db_config).'<br />';

$db_config = Configuration::getConfiguration('database', array('environment' => 'development'));
print_r($db_config).'<br />';


//Set An Environment variable based on a server configuration
if($_SERVER['HTTP_HOST']=='production')
	$environment = 'production';
else 
	$environment = 'development';

//Set the Environment based on the information retrieved from the server variable
Configuration::init(array('environment' => $environment));

//Will retrieve the the data based on the environemnt set in the init
$db_config = Configuration::getConfiguration('database');
print_r($db_config).'<br />';

