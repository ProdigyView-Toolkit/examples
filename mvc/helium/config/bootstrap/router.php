<?php
/*
 * Initialize the router and configure how the route is parsed. Add adapters, filters
 * and observers to the router. Add routes to the router.
 */

$route_configuration = array();
PVRouter::init($route_configuration);

//Add a closure that detects access levels
$access_level_closure = function ($route, $options) {;
	if(isset($options['access_level']) && !PVSecurity::checkUserAccessLevel(PVUsers::getUserID(), $options['access_level'])){
		PVTemplate::errorMessage('Please login to access this section of the site');
	}
		
};

PVRouter::addObserver('PVRouter::setRoute', 'access_closure', $access_level_closure, array('type' => 'closure') );

//Basic Routers
PVRouter::addRouteRule(array('rule'=>'/:controller'));
PVRouter::addRouteRule(array('rule'=>'/:controller/:action'));
PVRouter::addRouteRule(array('rule'=>'/:controller/:action/:id'));

//Redirect /users/login to /login and point login to the controller users and action login
PVRouter::addRouteRule(array('rule'=>'/users/login', 'redirect'=>'/login'));
PVRouter::addRouteRule(array('rule'=>'/login', 'route'=>array('controller'=>'users', 'action'=>'login')));

//Redirect /users/register to /register and point register to the controller users and action register
PVRouter::addRouteRule(array('rule'=>'/users/register', 'redirect'=>'/register'));
PVRouter::addRouteRule(array('rule'=>'/register', 'route'=>array('controller'=>'users', 'action'=>'register')));

//Redirect /users/logout to /logout and point logout to the controller users and action logout
PVRouter::addRouteRule(array('rule'=>'/users/logout', 'redirect'=>'/logout'));
PVRouter::addRouteRule(array('rule'=>'/logout', 'route'=>array('controller'=>'users', 'action'=>'logout')));

//The rule /rss with route to the post controller and the action rss
PVRouter::addRouteRule(array('rule'=>'/rss', 'route'=>array('controller'=>'post', 'action'=>'rss')));

//Retrict Routes by access levels
PVRouter::addRouteRule(array('rule'=>'/post/add', 'access_level'=>1, 'access_level_redirect'=>'/users/login'));

//Requires to access this page
PVRouter::addRouteRule(array('rule'=>'/users/admin', 'user_roles'=>array('Admin'), 'user_roles_redirect'=>'/users/login'));

//Will create an ssl connection if one does not exist
PVRouter::addRouteRule(array('rule'=>'/purchase', 'activate_ssl'=> true));

//Will remove an ssl connection if one does exist
PVRouter::addRouteRule(array('rule'=>'/logout', 'deactivate_ssl'=> true));
