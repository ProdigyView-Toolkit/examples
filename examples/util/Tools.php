<?php
//Include the DEFINES and boot the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_BootCompleteSystem.php');

/**
 * Tools are functions that are considered not to belong to any one aspect of ProdigyView.
 */

//Generate a Random String with a certain length and with only a certain number of characters

$random = PVTools::generateRandomString(5, 'abc123');
echo $random;

echo '<br />';

//Truncate  string of text, strip any html tags and add a trailer too it.

$string = '<strong>I want to talk about</strong> how nice it is today. Lets start with the sunshine!';
$truncated = PVTools::truncateText($string, 12, '...Read More');
echo $truncated;

echo '<br />';

echo PVTools::getCurrentUrl();

echo '<br />';

echo PVTools::getCurrentBaseUrl();

echo '<br />';

$url_parameters = array('controller' => 'blog', 'action' => 'view', 'id' => 1);

echo PVTools::formUriParameters($url_parameters);

echo '<br />';

echo PVTools::formUriPath($url_parameters);

echo '<br />';

$find = array('cat,', 'dog');
$search = array('bat', 'mouse', 'cow', 'dog', 'goat');

$found = PVTools::arraySearchRecursive($find, $search);

print_r($found);
