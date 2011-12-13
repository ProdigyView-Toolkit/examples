<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('UTC');

//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_classLoader.php');

$mycustomlibrares = new PVCollection();

PVLibraries::addToCollectionWithname('my_library', $mycustomlibrares);

$addLibrary = function($name, $location) {
	$libraries = PVLibraries::get('my_library');
	$libraries->add(array('name' => $name, 'location' => $location));
	PVLibraries::set('my_library', $libraries);
};

$retrieveLibrary = function() {
	$libraries = PVLibraries::get('my_library');
	return $libraries->getIterator();
};

PVLibraries::addMethod('addMyLibrary', $addLibrary);

PVLibraries::addMethod('getMyLibrary', $retrieveLibrary);

PVLibraries::addMyLibrary('mylib1.pv', '/var/www/libs/');
PVLibraries::addMyLibrary('mylib2.pv', '/etc/httpd/libs');
PVLibraries::addMyLibrary('mylib3.pv', PV_LIBRARIES.'addons'.DS);

$mylibs = PVLibraries::getMyLibrary();

foreach($mylibs as $lib) {
	echo '<strong>Name:</strong> '.$lib -> name. ' <strong>Location:</strong> '.$lib->location.'<br />';
}
