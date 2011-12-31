<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

/**
 * A Note Before Hand!
 * 
 * HTML5 is still in development and all of these functions WILL NOT
 * work as intended on every browser.
 */

if(isset($_POST) && !empty($_POST)) {
	echo 'A form has been submitted';
	print_r($_POST);
}

echo PVForms::formBegin('myform', array('method' => 'post', 'enctype' => 'multipart/form-data'));

	echo PVForms::label('Enter Your Email Address');
	echo PVForms::email('email_address');
	
	echo PVForms::label('Enter A Range');
	echo PVForms::range('number_range', array('min'=> 3, 'max' => 8));
	
	echo PVForms::label('Search for something you lost');
	echo PVForms::search('search_me');
	
	echo PVForms::label('Enter A Number that is a multiple of ');
	echo PVForms::number('number', array('step' => 2));
	
	echo PVForms::label('Enter A Time');
	echo PVForms::time('a_time');
	
	echo PVForms::label('Enter A Date');
	echo PVForms::date('a_date');
	
	echo PVForms::label('Select A Color');
	echo PVForms::color('color');
	
	echo PVForms::label('Enter A Website');
	echo PVForms::url('check_url');
	
	echo PVForms::label('Reset the Form');
	echo PVForms::reset('Email Address');
	
	echo PVForms::label('Submit It');
	echo PVForms::submit('submit');

echo PVForms::formEnd();