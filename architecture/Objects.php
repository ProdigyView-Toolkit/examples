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

//Create an object with no methods or variables
class EmptyObject extends PVObject {
	
}

//Create closure functions
$openmail = function(){
	
	echo '<p>You have mail!</p>';
};

$write_email = function($to, $message) {
	echo "Writing an email to $to with the message $message <br />";
};

//Instantiate the object
$empty =new EmptyObject();

//Add the functions
$empty -> addMethod('open', $openmail);
$empty -> addMethod('write', $write_email);

//Add data to the object
$empty -> addToCollectionWithName('sally', 'Sally has sent you a message <br />');
$empty -> addToCollectionWithName('Larry', 'You have received a message from Larry <br />');
$empty -> addToCollectionWithName('Destiny', 'Destiny has sent you a chain letter <br />');
$empty -> darrel = 'You sent Darrel the wrong email <br />';

//Call the functions that were added
$empty -> open();
$empty -> write('Mom', 'Hey mom how are you??');

//Get variables added
echo $empty -> sally;
echo $empty -> larry;

$iterable = $empty -> getIterator();

foreach($iterable as $key => $value) {
	echo "Key: $key Value: $value";
}

