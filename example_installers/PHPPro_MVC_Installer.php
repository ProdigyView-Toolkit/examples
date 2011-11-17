<?php
//Include the DEFINES and boo the system
include_once('../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Create an array with the required information that is related
//to the Model View Controoler
$args=array(
	'mvc_unique_id'=>'pv_phppro_mvc', 	//Required, used for initializing the MVC Later
	'mvc_name'=>'PHPPro MVC',			//The Name of the MVC
	'mvc_author'=>'PHPPro.org',			//The author of the MVC
	'mvc_version'=>.5, 					//ThE MVC Current Version
	'mvc_directory'=>'phppro_mvc/', 	//The directory that the MVC is in, related to the PV_MVC Define
	'mvc_file'=>'index.php', 			//The MVC main file
	'is_current_mvc'=>true, 			//Is the the MVC thaqt is currently being used. Important for initialization
			);

//Install the MVC
pv_installMVC($args);

$mvc_info=pv_getMVCInfo('pv_phppro_mvc');
echo 'Model View Controller "'.$mvc_info['mvc_name'].'" is installed';
?>