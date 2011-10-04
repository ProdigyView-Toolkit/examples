<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

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





?>