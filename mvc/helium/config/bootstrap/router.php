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

//Add Redirects of routes and set their controllers
PVRouter::addRouteRule(array('rule'=>'/users/login', 'redirect'=>'/login'));
PVRouter::addRouteRule(array('rule'=>'/login', 'route'=>array('controller'=>'users', 'action'=>'login')));

PVRouter::addRouteRule(array('rule'=>'/users/register', 'redirect'=>'/register'));
PVRouter::addRouteRule(array('rule'=>'/register', 'route'=>array('controller'=>'users', 'action'=>'register')));

PVRouter::addRouteRule(array('rule'=>'/users/logout', 'redirect'=>'/logout'));
PVRouter::addRouteRule(array('rule'=>'/logout', 'route'=>array('controller'=>'users', 'action'=>'logout')));

PVRouter::addRouteRule(array('rule'=>'/rss', 'route'=>array('controller'=>'post', 'action'=>'rss')));

//Retrict Routes by access levels
PVRouter::addRouteRule(array('rule'=>'/post/add', 'access_level'=>1, 'access_level_redirect'=>'/users/login'));
