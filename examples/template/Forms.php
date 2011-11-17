<?php
//Include the DEFINES and boo the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_BootCompleteSystem.php');

if(isset($_POST)) {
	echo 'A form has been submitted';
}

echo PVForms::formBegin();

echo PVForms::label('Name', array('for'=>'name'));
echo PVForms::text('name');

echo PVForms::label('Email', array('for'=>'email'));
echo PVForms::email('email');

echo PVForms::label('Password', array('for'=>'password'));
echo PVForms::email('password');

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
echo PVForms::radio('mugshot', array('value' => 'yes'));
echo PVForms::radio('mugshot', array('value' => 'no'));
echo '</div>';

echo PVForm::formEnd();
