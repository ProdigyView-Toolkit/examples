<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//Display the headers
echo PVHtml::h1('Header 1');
echo PVHtml::h2('Header 2');
echo PVHtml::h2('Header 3');
echo PVHtml::h2('Header 4');
echo PVHtml::h2('Header 5');
echo PVHtml::h3('Header 6');

echo PVHtml::p('Information in a paragraph');

echo PVHtml::div('Infomration inside a div');

//Create a link and display it in an article. HTML5 elemenet
$link = PVHtml::alink('ProdigyView', 'http://www.prodigyview.com');
echo PVHtml::article($link);

//Put strong in an aside. HTML5 element
$text = PVHtml::strong('Strong Text in an aside');
echo PVHtml::aside($text);

//Put an image in details. HTML5 Element
$image = PVHtml::image('http://www.prodigyview.com/media/images/prodigyview_logo.png');
echo PVHtml::details($image);

echo PVHtml::time('3:45');

$list = PVHtml::li('Eggs');
$list .= PVHtml::li('Bacon');
$list .= PVHtml::li('Cheese');

echo PVHtml::ol($list);
echo PVHtml::ul($list);

echo PVHtml::progress(30, 100);




