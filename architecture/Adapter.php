<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo PVHTML::h1('Code Example + Output');
echo PVHTML::p('Code will be at the beginning, with example output below.');

echo PVHtml::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo PVHtml::h3('Output From Code');


/**
 * Create a new Car class that extends PVObject
 */
class Car extends PVObject {

	public function build($details = array()) {

		if ($this -> _hasAdapter(get_class(), __FUNCTION__))
			return $this -> _callAdapter(get_class(), __FUNCTION__, $details);

		echo '<p>Beginning Construction</p>';
		echo '<p><strong>Make: </strong>' . $details['make'] . '</p>';
		echo '<p><strong>Model: </strong>' . $details['model'] . '</p>';
		echo '<p><strong>Year: </strong>' . $details['year'] . '</p>';

		return '<p>Car was constructed in Detroit. </p><br /><br />';
	}

}//end class

/**
 * The class the adapter will call if it is set.
 */
class CarFactory {

	public function build($details = array()) {
		echo '<p>Reconstructing Car At New Factory</p>';
		echo '<p><strong>New Make: </strong>' . $details['make'] . '</p>';
		echo '<p><strong>New Model: </strong>' . $details['model'] . '</p>';
		echo '<p><strong>New Year: </strong>' . $details['year'] . '</p>';

		return '<p>Car was constructed in Japan. </p><br /><br />';
	}

}

$car_details = array('make' => 'Ford', 'model' => 'Focus', 'year' => 2001);
$car = new Car();
echo $car -> build($car_details);

//Adding the adapter to the instance and runt he same command
$car -> addAdapter('Car', 'build', 'CarFactory', array('object' => 'instance'));
echo $car -> build($car_details);

/**
 * Create a new Car class that extends PVStaticObject
 */
class Truck extends PVStaticObject {

	public static function build($details = array()) {

		if (self::_hasAdapter(get_class(), __FUNCTION__))
			return self::_callAdapter(get_class(), __FUNCTION__, $details);

		echo '<p>Beginning Construction of Truck</p>';
		echo '<p><strong>Make: </strong>' . $details['make'] . '</p>';
		echo '<p><strong>Model: </strong>' . $details['model'] . '</p>';
		echo '<p><strong>Year: </strong>' . $details['year'] . '</p>';

		return '<p>Truck was constructed in Seattle. </p><br /><br />';
	}

}//end class

/**
 * The class the adapter will call if it is set.
 */
class TruckFactory {

	public static function build($details = array()) {
		echo '<p>Reconstructing Truck At New Factory</p>';
		echo '<p><strong>New Make: </strong>' . $details['make'] . '</p>';
		echo '<p><strong>New Model: </strong>' . $details['model'] . '</p>';
		echo '<p><strong>New Year: </strong>' . $details['year'] . '</p>';

		return '<p>Truck was constructed in China. </p><br /><br />';
	}

}

$truck_details = array('make' => 'Freightliner', 'model' => 'Columbia', 'year' => 2003);

echo Truck::build($truck_details);

//Add adapter as a static function and run same command
Truck::addAdapter('Truck', 'build', 'TruckFactory');
echo Truck::build($truck_details);


