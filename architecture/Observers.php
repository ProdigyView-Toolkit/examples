<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

class StalkerBook {
	
	public function updateFeed($message) {
		echo '<p>Someone is stalking you!: '.$message.'</p>';
	}
	
}//end class

class ClutterSpace {
	
	public static function updateWall($message) {
		echo '<p>Someone is adding clutter to your wall!: '.$message.'</p>';
	}
}

//Have messenger extend PVObject
class Messenger extends PVObject {
	
	public function addMessage($message){
		
		echo '<p>You have a new message: '.$message.'</p>';
		//Notifies that an event has occurred
		$this->_notify('new_message', $message);
	}
}

echo '<h1>Instance Observer</h1>';

echo '<h2>Without observers</h2>';

$messenger = new Messenger();
$messenger->addMessage('One Framework to rule them all!');

echo '<h2>Add observers</h2>';

//Add Event that will call an instance of an object
$messenger->addObserver('new_message' , 'StalkerBook', 'updateFeed', $options=array('object'=>'instance'));
//Add Event that will call a static method
$messenger->addObserver('new_message' , 'ClutterSpace', 'updateWall');
$messenger->addMessage('What was that wood chuck rhyme again?');


echo '<h1>Static Observer</h1>';


class FiveSquare {
	
	public function updateFeed($message) {
		echo '<p>Someone is bumping you!: '.$message.'</p>';
	}
	
}//end class

class PointlessIN {
	
	public static function updateWall($message) {
		echo '<p>Someone jobless has sent you a message: '.$message.'</p>';
	}
}

//Have PChat extend PVStatic Object
class PChat extends PVStaticObject {
	
	public static function addMessage($message){
		
		echo '<p>PChat is notifying you: '.$message.'</p>';
		//Notifies that an event has occurred
		self::_notify('new_message', $message);
	}
}

echo '<h2>Without Observers</h2>';

PChat::addMessage('One Framework to rule them all!');

echo '<h2>Add observers</h2>';

//Add Event that will call an instance of an object
PChat::addObserver('new_message' , 'FiveSquare', 'updateFeed', $options=array('object'=>'instance'));
//Add Event that will call a static method
PChat::addObserver('new_message' , 'PointlessIN', 'updateWall');
PChat::addMessage('What was that wood chuck rhyme again?');