<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//Create the collection
$collection = new PVCollection();

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
