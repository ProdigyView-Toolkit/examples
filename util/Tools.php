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
