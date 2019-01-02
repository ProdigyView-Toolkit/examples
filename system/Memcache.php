<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('UTC');

//Include the DEFINES and boot on the core componets.
//Do not initialize any of the other classes, that will be done manually
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//Add the server(s) for memcaching in an array. Set the server(s) to connect
//to by setting the connection to true
$config['memcache_servers'][] = array('host' => 'localhost', 'connect' => true);

Cache::init($config);

//Write data to memcache. Uses the default expiration
Cache::writeMemcache('mem0', '<p>Write some random infomration.<p>');
$content = Cache::readMemcache('mem0');
echo $content;

//Write data to memcache but set the expiration time
Cache::writeMemcache('mem1', '<p>Write about my day to memcache.<p>', array('cache_expire' => 120));
$content = Cache::readMemcache('mem1');
echo $content;

//Write data to memcache but only if the key DOES NOT exist
Cache::writeMemcache('mem1', '<p>Put Something new into memcache<p>', array('add_only' => true));
$content = Cache::readMemcache('mem1');
echo $content;

//Write data to memcache only if DOES exist
Cache::writeMemcache('mem2', '<p>Store me please<p>', array('replace' => true));
$content = Cache::readMemcache('mem2');
echo $content;

//Remove data that been added by a set key
Cache::removeMemcache('mem0');
$content = Cache::readMemcache('mem0');
echo $content;

//Expire all data and remove
Cache::removeMemcache('', array('flush' => true));
$content = Cache::readMemcache('mem1');
echo $content;
