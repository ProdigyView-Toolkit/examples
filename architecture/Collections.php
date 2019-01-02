<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

use prodigyview\util\Collection;
use prodigyview\template\Html;

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

//Create the collection
$collection = new Collection();

//Add Items to the collection
$collection -> add('ABC');
$collection -> add('It\'s easy as');
$collection -> add('1 2 3');

//Add a item with a key=>value relationio
$collection -> addWithName('artist', 'Jackson 5');
$collection -> addWithName('title', 'ABC');
$collection -> addWithName('year', '1970');

echo '<h1>Song Information</h2>';

echo '<p>Artist: ' . $collection -> get('artist') . '</p>';
echo '<p>Title: ' . $collection -> get('title') . '</p>';
echo '<p>Year: ' . $collection -> get('year') . '</p>';

//Get the collections iterator
$iterator = $collection -> getIterator();

echo '<h2>Iterate Through Collection</h2>';

foreach ($iterator as $key => $value) {
	echo "Key: $key Value: $value <br />";
}

echo '<h2>Manual Iteration</h2>';

//Reset Iterator to first indext
$iterator -> rewind();

//Get the value of the current index
echo '<p>Current: ' . $iterator -> current() . '</p>';

//Get the value of the next index
echo '<p>Next: ' . $iterator -> next() . '</p>';

//Get the value of the next index
echo '<p>Next: ' . $iterator -> next() . '</p>';

//Get the value of the previous index
echo '<p>Previous: ' . $iterator -> previous() . '</p>';

//Get the value of the last index
echo '<p>Last: ' . $iterator -> last() . '</p>';

//Get key value of the current index
echo '<p>Current Key: ' . $iterator -> key() . '</p>';
