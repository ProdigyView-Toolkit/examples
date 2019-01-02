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

//Functions use the Validator check feature
//Custom validaiton rules can be added using the addRule function

echo '<h1>Integer Validation</h1>';
//Use the validation that is default in the PVValidation class
$is_int = Validator::check('integer', 5);
echo ($is_int) ? '<p> Value is an integer</p>' : '<p>Value is NOT an integer</p>';
$is_int = Validator::check('integer', 3.2);
echo ($is_int) ? '<p> Value is an integer</p>' : '<p>Value is NOT an integer</p>';



echo '<h1>Function Validation</h1>';
//Create a function on the fly using the 'create_function' function
//Validate using this function
$function = $newfunc = create_function('$a,$b', 'return $a<$b;');
$validation_options=array(
	'type' => 'function',
	'function' => $function
);

Validator::addRule('lessThan', $validation_options);

$is_less = Validator::check('lessThan', 3, 5);
echo ($is_less) ? '<p> Value 1 is less than value 2</p>' : '<p>Value 1 is NOT less than value 2</p>';
$is_less = Validator::check('lessThan', 5, 3);
echo ($is_less) ? '<p> Value 1 is less than value 2</p>' : '<p>Value 1 is NOT less than value 2</p>';



echo '<h1>Preg_Match Validation</h1>';
//Create a validation using a preg_match
$validation_options=array(
	'type' => 'preg_match',
	'rule' => '/^\d*[05]$/'
);

Validator::addRule('endsWithZeroOrFive', $validation_options);

$ending = Validator::check('endsWithZeroOrFive', 3);
echo ($ending) ? '<p>Does end with 0 or 5</p>' : '<p>Does NOT end with 0 or 5</p>';
$ending  = Validator::check('endsWithZeroOrFive', 5);
echo ($ending) ? '<p>Does end with 0 or 5</p>' : '<p>Does NOT end with 0 or 5</p>';



//Use only with PHP 5.3
echo '<h1>Closure Validation</h1>';
//Create a function using a closure
$closure = function($value1, $value2) {
	return $value1 > $value2;
};
$validation_options=array(
	'type' => 'closure',
	'function' => $closure
);
Validator::addRule('greaterThan', $validation_options);

$is_greater = Validator::check('greaterThan', 3, 5);
echo ($is_greater) ? '<p> Value 1 is greater than value 2</p>' : '<p>Value 1 is NOT greater than value 2</p>';
$is_greater = Validator::check('greaterThan', 5, 3);
echo ($is_greater) ? '<p> Value 1 is greater than value 2</p>' : '<p>Value 1 is NOT greater than value 2</p>';
