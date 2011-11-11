<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Functions use the Validator check feature
//Custom validaiton rules can be added using the addRule function

echo '<h1>Integer Validation</h1>';
//Use the validation that is default in the PVValidation class
$is_int = PVValidator::check('integer', 5);
echo ($is_int) ? '<p> Value is an integer</p>' : '<p>Value is NOT an integer</p>';
$is_int = PVValidator::check('integer', 3.2);
echo ($is_int) ? '<p> Value is an integer</p>' : '<p>Value is NOT an integer</p>';



echo '<h1>Function Validation</h1>';
//Create a function on the fly using the 'create_function' function
//Validate using this function
$function = $newfunc = create_function('$a,$b', 'return $a<$b;');
$validation_options=array(
	'type' => 'function',
	'function' => $function
);

PVValidator::addRule('lessThan', $validation_options);

$is_less = PVValidator::check('lessThan', 3, 5);
echo ($is_less) ? '<p> Value 1 is less than value 2</p>' : '<p>Value 1 is NOT less than value 2</p>';
$is_less = PVValidator::check('lessThan', 5, 3);
echo ($is_less) ? '<p> Value 1 is less than value 2</p>' : '<p>Value 1 is NOT less than value 2</p>';



echo '<h1>Preg_Match Validation</h1>';
//Create a validation using a preg_match
$validation_options=array(
	'type' => 'preg_match',
	'rule' => '/^\d*[05]$/'
);

PVValidator::addRule('endsWithZeroOrFive', $validation_options);

$ending = PVValidator::check('endsWithZeroOrFive', 3);
echo ($ending) ? '<p>Does end with 0 or 5</p>' : '<p>Does NOT end with 0 or 5</p>';
$ending  = PVValidator::check('endsWithZeroOrFive', 5);
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
PVValidator::addRule('greaterThan', $validation_options);

$is_greater = PVValidator::check('greaterThan', 3, 5);
echo ($is_greater) ? '<p> Value 1 is greater than value 2</p>' : '<p>Value 1 is NOT greater than value 2</p>';
$is_greater = PVValidator::check('greaterThan', 5, 3);
echo ($is_greater) ? '<p> Value 1 is greater than value 2</p>' : '<p>Value 1 is NOT greater than value 2</p>';