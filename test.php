<?php
//Remember to include the DEFINES and to boot the system
include_once('DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

class Test extends PVObject {
	
	
	public function run(){
		
		//$newfunc = create_function('$data=array()', ' $data[]return "$a is going to the store";');
		$this->addFilter(get_class(),'run',  $newfunc);
		
		$result=$this->_applyFilter(get_class(),__FUNCTION__, 20, 5);
		
		print_r($result);
		
		$this->_addToDataSet(array('abc'=>123));
		
		
	}
}//end statiic object

$test=new Test();
$test->run();
echo $test->data->abc->convertTo('Go');

;
?>