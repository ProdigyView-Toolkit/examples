<?php
//Include the DEFINES and boot on the core componets.
//Do not initialize any of the other classes, that will be done manually
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCoreComponents.php');
$boot_options=array(
	'initialize_database'=>false,
	'initialize_libraries'=>false,
	'initialize_router'=>false,
	'initialize_template'=>false,
	'initialize_validator'=>false,
	'initialize_security'=>false,
	'initialize_session'=>false,
	'load_plugins'=>false,
	'load_configuration'=>false,
	'config'=>array('report_errors'=>true, 'log_errors'=>true, 'error_report_level'=>E_ALL)
);

//Boot the system with our custom designed  setting
PVBootstrap::bootSystem($boot_options);

//Set up data that we are going to pass into other
//objects and the collections
$custom_boot_options=array(
	'site_title'=>'My Site',
	'site_meta_tags'=>'my, site, totally, awesome',
	'cookie_lifetime'=>48000,
	'hash_cookie'=>true,
	'seo_urls'=>true,
	'mycrypt_mode'=>'ecb'
);

//Initialize the database connection.
//Class does not currently accept paramteers in init
PVDatabase::init();
PVDatabase::setDatabase(0);

//Inittialize the configruation class. All passed
//arguements will be saved
PVConfiguration::init($custom_boot_options);

//Initailize the sessionc class
PVSession::init($custom_boot_options);

//Initialize the routerer
PVRouter::init($custom_boot_options);

//Initialize security
PVSecurity::init($custom_boot_options);

//Initialize the template
PVTemplate::init($custom_boot_options);

//Add Configurations in manually
PVConfiguration::addConfiguration('myconfig', 'apply_all');

//Add An Array to a configuration
$options=array(
	'open'=>true,
	'pass'=>false,
	'tie'=>'stop'
);
PVConfiguration::addConfiguration('game_config', $options);

//Access values paseed into the configuration file
echo PVConfiguration::getConfiguration('site_title');
echo '<br />';
echo PVConfiguration::getConfiguration('cookie_lifetime');
echo '<br />';
print_r(PVConfiguration::getConfiguration('game_config'));

