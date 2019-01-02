<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

function parseDirectory($directory) {
	
	$list = '';
	if(is_array($directory)) {
	foreach($directory as $key => $value) {
		if(isset($value['type']) && $value['type'] == 'folder') {
			$list .= Html::li(basename($value['directory']));
			$list .= parseDirectory($value['files']);
			
		} else if(isset($value['type']) && $value['type'] == 'file'){
			$link_format = str_replace(dirname(__FILE__).DS, '', $key);
			$link = Html::alink($value['basename'], $link_format);
			$list .= Html::li($link);
		} else if(is_array($value)){
			
			$list .= parseDirectory($value);
		}
	}
	}
	
	return Html::ul($list);
}



echo Html::h1('Examples Directory');



$directory = FileManager::getFilesInDirectory(dirname(__FILE__).DS ,array('verbose' => true));

//echo '<pre>';
//print_r($directory);
echo parseDirectory($directory);

