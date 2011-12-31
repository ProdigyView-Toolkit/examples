<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

$config = array(
	'default_sender' => 'jane@example.com',
	'mailer' => 'php',
	'smtp_host' => 'somehost.example.com',
	'smtp_username' => 'auser',
	'smtp_password' => 'apassword',
	'smtp_port' => 587,		
);

PVMail::init($config);
