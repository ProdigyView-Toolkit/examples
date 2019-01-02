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

/**
 * A Note Before Hand!
 * 
 * HTML5 is still in development and all of these functions WILL NOT
 * work as intended on every browser.
 */

if(isset($_POST) && !empty($_POST)) {
	echo 'A form has been submitted';
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}

echo Forms::formBegin('myform', array('method' => 'post', 'enctype' => 'multipart/form-data'));

	echo Forms::label('Enter Your Email Address');
	echo Forms::email('email_address');
	
	echo Forms::label('Enter A Range');
	echo Forms::range('number_range', array('min'=> 3, 'max' => 8));
	
	echo Forms::label('Search for something you lost');
	echo Forms::search('search_me');
	
	echo Forms::label('Enter A Number that is a multiple of ');
	echo Forms::number('number', array('step' => 2));
	
	echo Forms::label('Enter A Time');
	echo Forms::time('a_time');
	
	echo Forms::label('Enter A Date');
	echo Forms::date('a_date');
	
	echo Forms::label('Select A Color');
	echo Forms::color('color');
	
	echo Forms::label('Enter A Website');
	echo Forms::url('check_url');
	
	echo Forms::label('Reset the Form');
	echo Forms::reset('reset_button');
	
	echo Forms::label('Submit It');
	echo Forms::submit('submit');

echo Forms::formEnd();