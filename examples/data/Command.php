<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

/**
 * Create a class that extends PVApplication. Keep in mind that
 * PVApplication extends PVObject which extends PVPatterns so you will
 * have a lot of tools are your disposal.
 */
class ColorPicker extends PVApplication {
	
	protected function blue(){
		return '0000ff';
	}
	
	protected function green(){
		return '#228b22';
	}
	
	protected function combine($color1, $color2) {
		return "$color1 + $color2 = You need photoshop";
	}
	
	//Default function is required. Will execute if the comman interper does not
	//find a command
	public function defaultFunction($params=array()){
		return 'No Color found';
	}
	
}

//Createa new objject
$color=new ColorPicker();

echo $color->commandInterpreter('green');

echo '<br />';

echo $color->commandInterpreter('blue');
 
echo '<br />';

echo $color->commandInterpreter('combine', 'Purple', 'Cyan');

echo '<br />';

echo $color->commandInterpreter('orange');