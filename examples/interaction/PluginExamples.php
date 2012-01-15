<?php
//Remember to include the DEFINES and to boot the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');
PVBootstrap::bootSystem(array('initialize_validator' => false));
/**
 * For these function to work, the hello world plugin must be installed first. Install it by running
 * the HelloWorldPluginInstaller.php
 */

callHelloWorldPlugin('I Want to say the the plugins class has many more capabilites beyond this');


if(PVValidator::check('isEqual', 1,2)){
	echo PVHtml::p('They are equal');
} else {
	echo PVHtml::p('They are NOT equal');
}

if(PVValidator::check('isEqual', 1,1)){
	echo PVHtml::p('They are equal');
} else {
	echo PVHtml::p('They are NOT equal');
}


?>