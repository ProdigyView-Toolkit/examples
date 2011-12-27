<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

$mail = array(
	'receiver' => 'bob@example.com', 
	'subject' => 'Test Message', 
	'message' => 'Hello World', 
	'smtp_host' => 'example.smtp.com', 
	'smtp_port' => '265', 
	'smtp_username' => 'JohnDoe', 
	'smtp_password' => 'X3rF3x1'
);

PVMail::sendEMailSMTP($mail);