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

if (isset($_POST) && !empty($_POST)) {
	echo 'A form has been submitted';
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}

echo PVForms::formBegin('myform', array('method' => 'post', 'enctype' => 'multipart/form-data'));

	echo PVForms::label('Name', array('for' => 'name'));
	echo PVForms::text('name');
	
	echo PVForms::label('Biography', array('for' => 'bio'));
	echo PVForms::textarea('bio', '');
	
	echo PVForms::label('Click Me', array('for' => 'click_me'));
	echo PVForms::button('click_me',array('style' => 'width: 200px', 'value' => 'Click Me'));
	
	echo PVForms::label('Password', array('for' => 'password'));
	echo PVForms::password('password');
	
	$select_options = array(
		'stake' => 'Stake', 
		'silver' => 'Silver', 
		'garlic' => 'Garlic', 
		'sunlight' => 'Sunlight'
	);
	
	echo PVForms::label('Weapons that can kill a werewolf', array('for' => 'werewolf-select'));
	echo PVForms::select('werewolf-select', $select_options, array('id' => 'weapons'));
	
	echo PVForms::label('Upload Mug Shot', array('for' => 'mugshot'));
	echo PVForms::file('mugshot');
	
	echo PVForms::label('Send Mugshot to police', array('for' => 'send_shot'));
	echo '<div>';
	echo PVForms::radio('send_shot', array('value' => 'yes'), array('disable_css' => true)) . 'Yes';
	echo PVForms::radio('send_shot', array('value' => 'no'), array('disable_css' => true)) . 'No';
	echo '</div>';
	
	echo '<p>Check to agree to the terms you never actually read</p>';
	echo PVForms::checkbox('agree');
	
	echo PVForms::hidden('invisible-man', array('value' => 'You cannot see me'));
	
	echo PVForms::submit('submit-form', 'Submit Me');

echo PVForms::formEnd();
