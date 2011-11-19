<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

PVTools::addAdapter('PVTools', 'parseSQLOperators', 'Test');
echo PVTools::parseSQLOperators('abc, 123, doe', 'role_name');

class Test {
	
	public static function parseSQLOperators($string, $name){
		
		$array = preg_split("/[\s]*[,][\s]*/", $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
		//$array = preg_replace("/[\s]*[,][\s]*/", 'OR '.$name.'= ', $string);
		preg_match_all("/[\s]*[,][\s]*/", $string, $matches);
		print_r($matches);
		print_r($array);
	}
}
