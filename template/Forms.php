<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

use prodigyview\template\Html;
use prodigyview\template\Forms;

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

if (isset($_POST) && !empty($_POST)) {
	echo 'A form has been submitted';
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}

echo Forms::formBegin('myform', array('method' => 'post', 'enctype' => 'multipart/form-data'));

	echo Forms::label('Name', array('for' => 'name'));
	echo Forms::text('name');
	
	echo Forms::label('Biography', array('for' => 'bio'));
	echo Forms::textarea('bio', '');
	
	echo Forms::label('Click Me', array('for' => 'click_me'));
	echo Forms::button('click_me',array('style' => 'width: 200px', 'value' => 'Click Me'));
	
	echo Forms::label('Password', array('for' => 'password'));
	echo Forms::password('password');
	
	$select_options = array(
		'stake' => 'Stake', 
		'silver' => 'Silver', 
		'garlic' => 'Garlic', 
		'sunlight' => 'Sunlight'
	);
	
	echo Forms::label('Weapons that can kill a werewolf', array('for' => 'werewolf-select'));
	echo Forms::select('werewolf-select', $select_options, array('id' => 'weapons'));
	
	echo Forms::label('Upload Mug Shot', array('for' => 'mugshot'));
	echo Forms::file('mugshot');
	
	echo Forms::label('Send Mugshot to police', array('for' => 'send_shot'));
	echo '<div>';
	echo Forms::radio('send_shot', array('value' => 'yes'), array('disable_css' => true)) . 'Yes';
	echo Forms::radio('send_shot', array('value' => 'no'), array('disable_css' => true)) . 'No';
	echo '</div>';
	
	echo '<p>Check to agree to the terms you never actually read</p>';
	echo Forms::checkbox('agree');
	
	echo Forms::hidden('invisible-man', array('value' => 'You cannot see me'));
	
	echo Forms::submit('submit-form', 'Submit Me');

echo Forms::formEnd();
