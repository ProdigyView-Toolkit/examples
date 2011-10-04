<?php
//Remember to include the DEFINES and to boot the system
include_once('DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Set Params to be Passed Through a Hook Call
$params=array(
	'name'=>'Bob',
	'message'=>'Hello World'
);

//Call a regular hook
pv_callHook('example_hook', $params);

//Call a hook that can ovveride a function
if(!pv_hookOverride('hook-name', $params)){
	callHelloWorldHook($params);
}



?>