<?php
//Include the DEFINES and include only the components. This will allow you to explicity 
//change the boot configuration to set your to fit your needs. Rememeber to not initialize
// the database or load the plugins.
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCoreComponents.php');

//Will boot the entire system. This is includes plugings
//require_once(PV_CORE.'_BootComplete.php');

//If none of the those boot options work, you can write your own just booting the core components
//And then configuring PVBootstap;

//Create a list of boot options to be used
$boot_options= array(
	'initialiaze_database' => FALSE,//If set to true, that database will be initialized and a connection made to the default database
	'initialize_libraries' => TRUE, //If set to true, the libraries class will be initialized
	'load_plugins' => FALSE,			//If set to true, the plugins in the database be loaded. Requires a database.
	'load_configuration' => FALSE,	//If set to true, the xml configuration file will be loadeded and used as a the configuration
	'config' => array(
		'report_errors' => TRUE,
		'log_errors' => FALSE,
		'error_report_level' =>E_ALL,
		'enable_cache' => FALSE
	)
);

//Boot the system with the defined arguements
PVBootstrap::bootSystem($boot_options);