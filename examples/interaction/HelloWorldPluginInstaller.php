<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Create an array with the required information that is related
//to the Plugin
$args=array(
	'plugin_unique_name'=>'hello_world_plugin', //All Plugins require a unique identifier
	'plugin_name'=>'HelloWorld Example Plugin',	//The Name of the plguin
	'plugin_language'=>'php',					//The language of the plugin. In PHP, 'php' is required
	'plugin_enabled'=>true, 					//Is the plugin enabled, if true the plugin will load at boot
	'is_frontend_plugin'=>true, 				//Is the plugin accessible from the frontend(PV_IS_ADMIN==FALSE)
	'is_admin_plugin'=>true, 					//Is the Plugin-in Accessible from the backend(PV_IS_ADMIN==TRUE)
	'plugin_hook'=>'example_hook', 							//If the plugin reponds to a hook, set the hook
	'plugin_directory'=>'', 					//THe directory the plugin resides, relative to the DEFINE PV_PLUGINS
	'plugin_file'=>'HelloWorldPlugin.php', 		//The main file of the plugin to be loaded
			);

//Install the Plugin
pv_installPlugin($args);

$plugin_info=pv_getPlugin('hello_world_plugin');
echo 'Plugin "'.$plugin_info['plugin_name'].'" is installed';
?>