<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');


class Run extends PVStaticObject{
	
	public static function goForARun($miles) {
		
		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__, $miles);
		
		$miles = self::_applyFilter(get_class(), __FUNCTION__, $miles, array('event' => 'args'));
		
		$return ='I ran '.$miles. ' miles today';
		
		self::_notify(get_class() . '::' . __FUNCTION__, $miles, $return);
		$return = self::_applyFilter(get_class(), __FUNCTION__, $return, array('event' => 'return'));
		
		return $return;
	}
}

echo Run::goForARun(3);

//Create an anonymous function and add it as a filter.
//Remember to set the type as 'closure' and the event correctly
$arguements_filter = function($data, $options) {
	$data = $data + .5;
	
	return $data;
};

Run::addFilter('Run', 'goForARun', 'run_filter', $arguements_filter, array('type' => 'closure', 'event' => 'args'));

//This time add the anonymous function directly in the filter and set it for a different event
Run::addFilter('Run', 'goForARun', 'run_filter', function($data, $options) {
	
	$data = PVHtml::strong($data);
	$data = PVHtml::p($data);
	
	return $data;
	
}, array('type'=> 'closure', 'event' => 'return'));

//Add an observer with an anonymous function
Run::addObserver('Run::goForARun', 'run_observer', function($miles, $return){
	echo PVHtml::div('Running '. $miles. ' has caused you to lose 2 pounds', array('style' => 'margin-top:10px;'));
}, array('type' => 'closure'));

echo Run::goForARun(5);

//Add an adapter as an anonymous function. Remember to set the type to closure
Run::addAdapter('Run','goForARun', function($miles){
	echo PVHtml::p('Because of the weather, you were not able to run '.$miles. ' today');
}, array('type' => 'closure'));

echo Run::goForARun(8);


