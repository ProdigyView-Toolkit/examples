<?php
//This function will only be executable if the the HelloWorldPlugin is installed
function callHelloWorldPlugin($text){

		echo PVHtml::p('Hello, I just want to thank HelloWorldPlugin. With it, I would not be there.I also want to add some text below');
		echo PVHtml::p($text);
	
}//end callHelloWorld


//Add A validation through the plugin. When the plugin loads, this custom validation
//rule will be added to PVValidator
$closure = function($value1, $value2) {
	return $value1 === $value2;
};

$validation_options=array(
	'type' => 'closure',
	'function' => $closure
);

PVValidator::addRule('isEqual', $validation_options);

?>