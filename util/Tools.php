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

/**
 * Tools are functions that are considered not to belong to any one aspect of ProdigyView.
 */

//Generate a Random String with a certain length and with only a certain number of characters

$random = Tools::generateRandomString(5, 'abc123');
echo $random;

echo '<br />';

//Truncate  string of text, strip any html tags and add a trailer too it.

$string = '<strong>I want to talk about</strong> how nice it is today. Lets start with the sunshine!</strong>';
$truncated = prodigyview\util\Tools::truncateText($string , 12, '...Read More');
echo $truncated;

echo '<br />';

echo Router::getCurrentUrl();

echo '<br />';

echo Tools::getCurrentBaseUrl();

echo '<br />';

$url_parameters = array('controller' => 'blog', 'action' => 'view', 'id' => 1);

echo Tools::formUrlParameters($url_parameters);

echo '<br />';

echo Tools::formUrlPath($url_parameters);

echo '<br />';

$find = array('cat,', 'dog');
$search = array(
	'animals' => array('bat', 'mouse', 'cow', 'dog', 'goat'),
	'places' => array('paris', 'london', 'nigerea'),
	'things' => array('shirt', 'ball', 'shelf')
);

$found = Tools::arraySearchRecursive($find, $search);

print_r($found);
