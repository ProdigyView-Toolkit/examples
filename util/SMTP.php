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