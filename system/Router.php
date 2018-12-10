<?php
//Include the DEFINES and boot the system
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo PVHTML::h1('Code Example + Output');
echo PVHTML::p('Code will be at the beginning, with example output below.');

echo PVHtml::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo PVHtml::h3('Output From Code');

//Add A basic route
$route=array(
	'rule'=>'/:controller/:action',
);
PVRouter::addRouteRule($route);

//Add a route with a redirect
$route=array(
	'rule'=>'/user/login',
	'redirect'=>'Router.php?option=redirect'
);
PVRouter::addRouteRule($route);

//Add a route that has an access level requirement
$route=array(
	'rule'=>'/user/login',
	'access_level'=>2,
	'access_level_redirect'=>'Router.php?option=access_level_denied'
);
PVRouter::addRouteRule($route);

//Add a route that has an access level requirement
$route=array(
	'rule'=>'/user/login',
	'user_roles'=>array('Administrator', 'Super Administrator'),
	'user_roles_redirect'=>'Router.php?user_role_denied'
);
PVRouter::addRouteRule($route);

//Now that we have your rules set, we enforce them by setting the current.
//Set the route is done by either passing in an uri or the current uri will
//be used as default

PVRouter::setRoute();

//Use a router, the uri's query string with parameters such as
//index.php?controller=test1&action=test2 become /test1/test2 . To access these
//parameters we use the PVRouter::getRouteVariable();

echo PVRouter::getRouteVariable('controller');
echo PVRouter::getRouteVariable('action');

//To get all the information on a current route with rules that match 
//that route, simply use getRoute after setRoute() has been called.
$matched_route = PVRouter::getRoute();

print_r($matched_route);





?>