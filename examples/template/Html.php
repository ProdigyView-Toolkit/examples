<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//The router is being initialized to make all links made friendly urls
//PVRouter::init(array('seo_urls' => true));

//Display the headers
echo PVHtml::h1('Header 1');
echo PVHtml::h2('Header 2', array('class' => 'sub-header'));
echo PVHtml::h3('Header 3', array('id' => 'header3'));
echo PVHtml::h4('Header 4', array('style' => 'display:inline'));
echo PVHtml::h5('Header 5', array('style' => 'display:inline'));
echo PVHtml::h6('Header 6');

//Create a paragraph
echo PVHtml::p('Information in a paragraph');

//Createa a div
echo PVHtml::div('Infomration inside a div', array('onkeyup' => "alert('Key is up')"));

//Create a link and display it in an article. HTML5 elemenet
echo PVHtml::alink('ProdigyView', 'http://www.prodigyview.com', array('onclick' => "alert('Come Back Soon!')"));
echo '<br />';

//Create a link and display it in an article. HTML5 elemenet
echo PVHtml::alink('HTML5 Elements', array('controller' => 'examples', 'action' => 'template', 'file' => 'Html5.php'));
echo '<br />';

//Display a link to a css file
echo PVHtml::link('/css/style.css', array('type' => 'text/css', 'media' => 'print'));
echo '<br />';

//Display a meta tag
echo PVHtml::meta('title', array('chartset' => 'utf', 'content' => 'HTML Demo'));
echo '<br />';

//Display a span tag
echo PVHtml::span('Go the distance', array('class' => 'inner-element'));
echo '<br />';

//Replaces <b> and prints out font in bold
echo PVHtml::strong('The bolder site', array( 'style' => 'font-size: 25px;') );
echo '<br />';

//Display an image
echo PVHtml::image('http://www.prodigyview.com/media/images/prodigyview_logo.png');

//Create <li> to go in <ol> and <ul>
$list = PVHtml::li('Eggs');
$list .= PVHtml::li('Bacon');
$list .= PVHtml::li('Cheese');

//Create an ol list
echo PVHtml::ol($list);

//Create a ul list
echo PVHtml::ul($list);

//Create an Iframe
echo PVHtml::iframe('http://www.prodigyview.com', 'Sorry, your browser does not support iframes.', array('width' => 200));
