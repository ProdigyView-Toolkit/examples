<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

if(isset($_POST)) {
	echo 'A form has been submitted';
}

echo PVForms::formBegin('myform');

echo PVForms::label('Name', array('for'=>'name'));
echo PVForms::text('name');

echo PVForms::label('Email', array('for'=>'email'));
echo PVForms::email('email');

echo PVForms::label('Password', array('for'=>'password'));
echo PVForms::password('password');

$select_options = array(
	'stake' => 'Stake',
	'silver' => 'Silver',
	'garlic' => 'Garlic',
	'sunlight' => 'Sunlight'
);

echo PVForms::label('Weapons that can kill a werewolf', array('for'=>'werewolf-select'));
echo PVForms::select('werewolf-select', $select_options);

echo PVForms::label('Upload Mug Shot', array('for'=>'mugshot'));
echo PVForms::file('mugshot');

echo PVForms::label('Send Mugshot to police', array('for'=>'mugshot'));
echo '<div>';
echo PVForms::radio('mugshot', array('value' => 'yes'), array('disable_css'=>true)).'Yes';
echo PVForms::radio('mugshot', array('value' => 'no'), array('disable_css'=>true)).'No';
echo '</div>';

echo '<p>Check to agree to the terms you never actually read</p>';
echo PVForms::checkbox('agree');

echo PVForms::hidden('invisible-man', array('value' => 'You cannot see me'));

echo PVForms::submit('submit-form');

echo PVForms::formEnd();
