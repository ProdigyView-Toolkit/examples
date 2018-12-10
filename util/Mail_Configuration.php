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

$config = array(
	'default_sender' => 'jane@example.com',
	'mailer' => 'php',
	'smtp_host' => 'somehost.example.com',
	'smtp_username' => 'auser',
	'smtp_password' => 'apassword',
	'smtp_port' => 587,		
);

PVMail::init($config);
