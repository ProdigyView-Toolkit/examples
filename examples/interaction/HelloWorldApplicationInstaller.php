<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Create an array with the required information that pertains
//to the applications
$args=array(
	'app_name'=>'HelloWorld', 				//Name of the Application
	'app_unique_id'=>'helloworld_example', 	//The Application Identifer
	'app_directory'=>'HelloWorld/', 		//Applications Frontend Directory
	'app_file'=>'HelloWorld.php', 			//Application File that has the applications object to be called
	'app_object'=>'HelloWorld', 			//The Applications' Object that s
	'admin_dir'=>'HelloWorldAdmin/', 		//Application Admin Directory
	'admin_file'=>'HelloWorldAdmin.php', 	//Application Admin File
	'admin_object'=>'HelloWorldAdmin', 		//Application Admin Object
	'enabled'=>1,							//Make sure the application is enabled to make it callable
	'application_language'=>'php',			//Set the application's language(php, java or objective-c)
	'app_version'=>1.1,						//Set the applicaiton version
	'app_site'=>'http://www.prodigyview.com',//Applicaiton ome page
	'app_author'=>'ProdigyView Example Team'//Applications authors
);
//Install the Applications Information
pv_installApplication($args);
$app_info=pv_getApplication('helloworld_example');
echo 'Application '.$app_info['app_name'].' is Installed';
?>