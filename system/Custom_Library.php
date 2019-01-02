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

$mycustomlibrares = new Collection();

Libraries::addToCollectionWithname('my_library', $mycustomlibrares);

$addLibrary = function($name, $location) {
	$libraries = Libraries::get('my_library');
	$libraries->add(array('name' => $name, 'location' => $location));
	Libraries::set('my_library', $libraries);
};

$retrieveLibrary = function() {
	$libraries = Libraries::get('my_library');
	return $libraries->getIterator();
};

Libraries::addMethod('addMyLibrary', $addLibrary);

Libraries::addMethod('getMyLibrary', $retrieveLibrary);

Libraries::addMyLibrary('mylib1.pv', '/var/www/libs/');
Libraries::addMyLibrary('mylib2.pv', '/etc/httpd/libs');
Libraries::addMyLibrary('mylib3.pv', PV_LIBRARIES.'addons'.DS);

$mylibs = Libraries::getMyLibrary();

foreach($mylibs as $lib) {
	echo '<strong>Name:</strong> '.$lib -> name. ' <strong>Location:</strong> '.$lib->location.'<br />';
}
