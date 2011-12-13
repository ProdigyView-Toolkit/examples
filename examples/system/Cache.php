<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('UTC');

//Include the DEFINES and boot on the core componets.
//Do not initialize any of the other classes, that will be done manually
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//Initialize PVCache
PVCache::init();

//Uses the default caching set
PVCache::writeCache('c0', '<p>Saving for later!</p>');

//Cache is set for 1 minute, after writing comment out and wait 1 minute to expire
PVCache::writeCache('c1', '<p>Some stuff I want to cache for later</p>', array('cache_expire' => 60));

//Cache is set for 2 minutes, after writing comment out and wait 2 minutes to expire
PVCache::writeCache('c2', '<p>More content I want to cache for latter</p>', array('cache_name' => 'pv_cache:', 'cache_expire' => 120));

$content = PVCache::readCache('c1');
echo $content;

$content = PVCache::readCache('c2');
echo $content;

$content = PVCache::readCache('c1', array('remove_cache_tag' => false));
echo $content;

$content = PVCache::readCache('c2', array('cache_name' => 'pv_cache:', 'remove_cache_tag' => false));
echo $content;

$has_expired = PVCache::hasExpired('c1');

if ($has_expired)
	echo '<p>Content has expiered</p>';
else
	echo '<p>Content is not expired</p>';

$has_expired = PVCache::hasExpired('c2', array('cache_name' => 'pv_cache:'));

if ($has_expired)
	echo '<p>Content has expiered</p>';
else
	echo '<p>Content is not expired</p>';

$expiration = PVCache::getExpiration('c0');
echo $expiration . '<br />';

$expiration = PVCache::getExpiration('c1');
echo $expiration . '<br />';

$expiration = PVCache::getExpiration('c2', array('cache_name' => 'pv_cache:'));
echo $expiration . '<br />';

PVCache::deleteCache('c1');
$content = PVCache::readCache('c1');
echo $content;

PVCache::deleteCache('c2');
$content = PVCache::readCache('c2');
echo $content;

//Caching of objects and arrays is also possbile
PVCache::writeCache('c3', array('apple', 'strawberry', 'grape'));
$content = PVCache::readCache('c3');
print_r($content);
PVCache::deleteCache('c3');

/**
 * An example of how cache can be  used
 */
function getContent($name) {
	
	if(!PVCache::hasExpired($name)) {
		return PVCache::readCache($name);
	} else {
		$result = PVDatabase::query('SELECT content FROM TABLE_A WHERE ID='.PVDatabase::makeSafe($name));
		$row = PVDatabase::fetchArray($result);
		PVCache::writeCache($name, $row['content']);
		return $row['content'];
	}
	
}
