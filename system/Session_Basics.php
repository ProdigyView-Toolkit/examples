<?php
//Include the DEFINES and boot on the core componets.
//Do not initialize the session, that will be done manually
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo PVHTML::h1('Code Example + Output');
echo PVHTML::p('Code will be at the beginning, with example output below.');

echo PVHtml::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo PVHtml::h3('Output From Code');

//Set A few session arguements and initialize the session
$session_args = array(	
		'cookie_path' => '/', 
		'cookie_domain' => $_SERVER['HTTP_HOST'], 
		'cookie_secure' => false, 
		'cookie_httponly' => false, 
		'cookie_lifetime' => 5000, 
		'hash_cookie' => false, 
		'hash_session' => false, 
		'session_name' => 'pv_session', 
		'session_lifetime' => 2000, 
		'session_path' => '/', 
		'session_domain' => $_SERVER['HTTP_HOST'], 
		'session_secure' => false, 
		'session_httponly' => false, 
		'session_start' => true
);

PVSession::init($session_args);