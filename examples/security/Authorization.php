<?php
//Include the DEFINES and boo the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_BootCompleteSystem.php');

//Set the columns for a table to enter the users into
$columns = array(
 	'id' => array( 'auto_increment' => true, 'type' =>'int'),
 	'email' => array('type'=>'string', 'precision' => 200),
 	'ssn' =>  array('type'=>'string', 'precision' => 200),
 	'password' => array('type'=>'string', 'precision' => 200),
);
 
//Set the table name
$table_name = 'ssn_user';
//Create the table if it does not exist
if(!PVDatabase::tableExist($table_name)) {
	$executed_query = PVDatabase::createTable($table_name, $columns, array('primary_key' => 'id'));
}

//Set the arguements for initialize the security class
$security_config = array(		
	'mcrypt_key' => 'Zap32', 						//encryption key
	'mcrypt_iv' => 'j4F43jump',							//encryption iv
	'salt' => '!abcZae',							//Set the default salt for the hash
	'cookie_fields' => array('id', 'email'),		//If authentication is successful, add to cookie
	'session_fields' => array('id', 'email'),		//If authentication is successful, add fields to session
	'auth_hashed_fields' => array('password'),		//Hash the passwords on authentication
	'auth_encrypted_fields' => array('ssn'),	//encrypt these fields on authentication,
	'auth_table' => $table_name
);
//Initiliaze the security class
PVSecurity::init($security_config);

//Set the user data
$data = array(
	'email' => 'joe@example.com',				//user email
	'ssn' => PVSecurity::encrypt('111222333'),	//encrypt the ssn
	'password' => PVSecurity::hash('abc123')	//hash the password
);

//Insert user and data into the table in the database
PVDatabase::insertStatement($table_name, $data);

//Fields that will be used to authenticate user
$fields = array(
	'email' => 'joe@example.com',
	'ssn' => '111222333',
	'password' => 'abc123'
);

//Authenticate user on fields
if(PVSecurity::checkAuth($fields)){
	echo PVHtml::p('Authentification Successful');
	print_r($_COOKIE);
	print_r($_SESSION);
} else {
	echo PVHtml::p('Authentificaiton Failed');
}

//Create a custom salt based on the first two numbers of thess
$custom_salt = substr('444555666', 0, 2);

$data = array(
	'email' => 'jane@example.com',							//Set the user email	
	'ssn' => PVSecurity::encrypt('444555666'),				//Encrypt the ssn
	'password' => PVSecurity::hash('abc123', $custom_salt)	//Hash with custom salt
);
//Insert data into the table in the database
PVDatabase::insertStatement($table_name, $data);

//Authenticate users based on the following fields
$fields = array(
	'email' => 'jane@example.com',							
	'ssn' => '444555666',				
	'password' => 'abc123',
);

$options = array(
	'salt' => $custom_salt,							//Set the custom salt in the options
	'session_fields' => array('id', 'email', 'ssn'),//Add the ssn to save a the session
);

//Authenticate user on fields with options
if(PVSecurity::checkAuth($fields, $options)){
	echo PVHtml::p('Authentification Successful');
	print_r($_COOKIE);
	print_r($_SESSION);
} else {
	echo PVHtml::p('Authentificaiton Failed');
}

