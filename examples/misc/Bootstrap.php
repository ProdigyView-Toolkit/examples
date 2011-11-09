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

$boot_options= array(
	'initialiaze_database' => FALSE,
	'initialize_libraries' => TRUE,
	'load_plugins' => FALSE
);
