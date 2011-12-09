<?php
//Include the DEFINES and boot on the core componets.
//Do not initialize the session, that will be done manually
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');
PVBootstrap::bootSystem(array('initialize_session' => false));

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