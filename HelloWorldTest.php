<?php
//Remember to include the DEFINES and to boot the system
include_once('DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Remember to install the application before running example
//Install Files are in the example_installer directories
 
//Calls the application 'HelloWorld'
pv_exec('helloworld_example', '', '');

//Call HelloWorld with the command seebob
pv_exec('helloworld_example', 'seebob', array());

//Call Hello World with the command 'hijudy' and passes a paramter through
pv_exec('helloworld_example', 'hijudy', array('a_name'=>'John'));

//Call the Admin Section
//Remember this will ONLY work if the define PV_IS_ADMIN is set to TRUE
pv_exec_admin('helloworld_example', '', '');

?>