<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('UTC');

//Include the DEFINES and boot on the core componets.
//Do not initialize any of the other classes, that will be done manually
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

PVBootstrap::bootSystem(array('initialize_cache' => false));

$defaults = array(
	'cache_location' => PV_ROOT . DS . 'tmp' . DS, 						//Default location to store the cache
	'cache_format' => 'Y-m-d H:i:s', 									//Time Date format of the cache
	'cache_format_search' => '\d{4}\-\d{2}\-\d{2} \d{2}:\d{2}:\d{2}', 	//Date Pregmatch search for the cache
	'enclosing_tags' => array('{', '}'), 								//Tags that enclose the cache
	'cache_name' => 'cache:', 											//Default name of the cache when saved
	'cache_expire' => 300, 												//The default time in seconds the cache expires
	'memcache_servers' => array()										//Memcache servers to connect too
);

PVCache::init($defaults);
