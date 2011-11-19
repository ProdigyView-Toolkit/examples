<?php
//Variables can be considered items that hold information or values.
$var1 = 'Welcome to the ProdigyView PHP Basics Tutorial';

$var2 = 5;

//Variables can also objects, data structures like array, and closures.

$object = new MyObject();

$array[0] = 'My text in an array';

//Defines are variables (strings and numeric values) that are set and made GLOBAl.
//Because Defines are global, they are accessible anywhere in the code. Defines cannot be changed.

define('DEFINITION_1', 45);

define('DEFINITION_2', 'Hello Word');

echo DEFINITION_1.'<br />';

echo DEFINITION_2.'<br />';

//A very useful data structure is array. Arrays can hold multiple variables. The index in an
//array can also be named.

$array['var1'] = $var1;
$array['var2'] = $var2;

$array_2 = array(1, 2, 3);

$array_3 = array('item1' => 'First Item', 'item2' => 'Second Item');

//Array can be combined to form an array with the two combined values. Array can be iterated(searched) through
//using a for loop. When iterating through an array, the key is the index which points to a particular value.

$array_4 = $array_2 + $array_3;

foreach ($array_4 as $key => $value) {
	echo "Key $key Value $value <br />";
}

//Functions is a segment of code that can be called to perform a certain task. Functions can have variables,
//arrays and calls to other functions inside of them

function add($value1, $value2) {
	$value3 = $value1 + $value2;

	return $value3;
}

echo add(2, 3).'<br />';

//Objects are data structures that can contain multipe functions, and variables. If you are familiar with variable
//visibility, variables can be assigned to be public, private and protected.
class MyObject {

	public $var1 = 6;
	
	public function __construct() {
		$this -> var1 = 6;
	}

	function multiply($var2) {
		return $this -> var1 * $var2;
	}

}

$object = new MyObject();

echo $object -> multiply(3);