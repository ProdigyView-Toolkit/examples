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

//Initialize Cache
Cache::init();

//Uses the default caching set
Cache::writeCache('c0', '<p>Saving for later!</p>');

//Cache is set for 1 minute, after writing comment out and wait 1 minute to expire
Cache::writeCache('c1', '<p>Some stuff I want to cache for later</p>', array('cache_expire' => 60));

//Cache is set for 2 minutes, after writing comment out and wait 2 minutes to expire
Cache::writeCache('c2', '<p>More content I want to cache for latter</p>', array('cache_name' => 'pv_cache:', 'cache_expire' => 120));

$content = Cache::readCache('c1');
echo $content;

$content = Cache::readCache('c2');
echo $content;

$content = Cache::readCache('c1', array('remove_cache_tag' => false));
echo $content;

$content = Cache::readCache('c2', array('cache_name' => 'pv_cache:', 'remove_cache_tag' => false));
echo $content;

$has_expired = Cache::hasExpired('c1');

if ($has_expired)
	echo '<p>Content has expiered</p>';
else
	echo '<p>Content is not expired</p>';

$has_expired = Cache::hasExpired('c2', array('cache_name' => 'pv_cache:'));

if ($has_expired)
	echo '<p>Content has expiered</p>';
else
	echo '<p>Content is not expired</p>';

$expiration = Cache::getExpiration('c0');
echo $expiration . '<br />';

$expiration = Cache::getExpiration('c1');
echo $expiration . '<br />';

$expiration = Cache::getExpiration('c2', array('cache_name' => 'pv_cache:'));
echo $expiration . '<br />';

Cache::deleteCache('c1');
$content = Cache::readCache('c1');
echo $content;

Cache::deleteCache('c2');
$content = Cache::readCache('c2');
echo $content;

//Caching of objects and arrays is also possbile
Cache::writeCache('c3', array('apple', 'strawberry', 'grape'));
$content = Cache::readCache('c3');
print_r($content);
Cache::deleteCache('c3');

/**
 * An example of how cache can be  used
 */
function getContent($name) {
	
	if(!Cache::hasExpired($name)) {
		return Cache::readCache($name);
	} else {
		$result = Database::query('SELECT content FROM TABLE_A WHERE ID='.Database::makeSafe($name));
		$row = Database::fetchArray($result);
		Cache::writeCache($name, $row['content']);
		return $row['content'];
	}
	
}
