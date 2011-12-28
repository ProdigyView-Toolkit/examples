<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

/**
 * Tools are functions that are considered not to belong to any one aspect of ProdigyView.
 */

//Generate a Random String with a certain length and with only a certain number of characters

$random = PVTools::generateRandomString(5, 'abc123');
echo $random;

echo '<br />';

//Truncate  string of text, strip any html tags and add a trailer too it.

$string = '<strong>I want to talk about</strong> how nice it is today. Lets start with the sunshine!</strong>';
$truncated = PVTools::truncateText($string , 12, '...Read More');
echo $truncated;

echo '<br />';

echo PVTools::getCurrentUrl();

echo '<br />';

echo PVTools::getCurrentBaseUrl();

echo '<br />';

$url_parameters = array('controller' => 'blog', 'action' => 'view', 'id' => 1);

echo PVTools::formUrlParameters($url_parameters);

echo '<br />';

echo PVTools::formUrlPath($url_parameters);

echo '<br />';

$find = array('cat,', 'dog');
$search = array(
	'animals' => array('bat', 'mouse', 'cow', 'dog', 'goat'),
	'places' => array('paris', 'london', 'nigerea'),
	'things' => array('shirt', 'ball', 'shelf')
);

$found = PVTools::arraySearchRecursive($find, $search);

print_r($found);
