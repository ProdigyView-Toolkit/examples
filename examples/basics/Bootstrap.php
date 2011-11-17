<?php
//Start the boot by including the Defines
//This will set up the directory
include_once('../../DEFINES.php');

//Include the _classLoader
//This uses spl_autload for loading the classes. Will only located the classes required
include_once(PV_CORE.'_classLoader');

//If Uncommented, this include will boot the entire system. This is includes plugings
//require_once(PV_CORE.'_BootCompleteSystem.php');

//If uncommented, will boot the database without the plugins
//require_once(PV_CORE.'_BootMinusPlugins.php');

//If uncommmented, Will bot the sytem without the database and also no plugins
//require_once(PV_CORE.'_BootMinusDatabase.php');

/** 
 *If none of the those boot options work, you can write your own just booting the core components
 * And then configuring PVBootstap;
 */

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

echo 'A successful boot1';
