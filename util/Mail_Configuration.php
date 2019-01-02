<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

$config = array(
	'default_sender' => 'jane@example.com',
	'mailer' => 'php',
	'smtp_host' => 'somehost.example.com',
	'smtp_username' => 'auser',
	'smtp_password' => 'apassword',
	'smtp_port' => 587,		
);

Mail::init($config);
