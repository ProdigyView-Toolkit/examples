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
