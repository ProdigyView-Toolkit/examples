<?php
/**
 * Configuration the session in this file. Also add adapters, filters and observers
 * to the session class.
 */

$session_configuration = array(
	'cookie_lifetime' => 50000,
	'session_lifetime' => 10000,
);

PVSession::init($session_configuration);

/*
$session_ensure_write = function($name, $value, $options) {
	session_write_close();
	session_start();
	session_regenerate_id();
	
};

PVSession::addObserver('PVSession::writeSession', 'session_ensure_write', $session_ensure_write, array('type' => 'closure'));*/
