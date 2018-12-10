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
