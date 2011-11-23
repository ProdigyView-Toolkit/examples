<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
//Include the DEFINES and boo the system
include_once('DEFINES.php');
require_once(PV_CORE.'_classLoader.php');

/**
 * Disable the normal boot option and configure your own in the bootstrap.
 */
$boot_options = array(
	'initialize_database' => true, 
	'initialize_libraries' => false, 
	'initialize_router' => false, 
	'initialize_template' => false, 
	'initialize_validator' => false, 
	'initialize_security' => false, 
	'initialize_session' => false, 
	'load_plugins' => false, 
	'load_libraries' => false, 
	'load_configuration' => false,
	'load_database' => true, 
	'load_database_profile' => 0, 
	'config' => array('report_errors' => true)
);

PVBootstrap::bootSystem($boot_options);


$info = PVMVC::getMVCInfo('helium');

if(!empty($info)) {
	PVMVC::initiliazeMVC('helium');
} else {
	echo PVHtml::h1('Helium Installer');
	echo PVHtml::p('Helium is an example MVC that comes with ProdigyView. To install, make sure you have installed ProdigyView with a database . 
	In a web browser, install Helium with examples/interaction/Helium_MVC_Installer.php');
}
