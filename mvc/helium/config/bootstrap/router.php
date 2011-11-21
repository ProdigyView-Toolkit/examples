<?php
/*
 * Initialize the router and configure how the route is parsed. Add adapters, filters
 * and observers to the router. Add routes to the router.
 */

$route_configuration = array();
PVRouter::init($route_configuration);

//Basic Routers
PVRouter::addRouteRule(array('rule'=>'/:controller'));
PVRouter::addRouteRule(array('rule'=>'/:controller/:action'));
PVRouter::addRouteRule(array('rule'=>'/:controller/:action/:id'));
