<?php

 /*** error reporting on ***/
 //error_reporting(E_ALL);

 /*** define the site path ***/
 $site_path = PV_MVC.'helium'.DS;
 define ('__SITE_PATH', $site_path);

 /*** include the init.php file ***/

 include 'config/bootstrap.php';
 include 'includes/init.php';
 
 

// spl_autoload_register('modelLoader');

 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . '/controller');
 
 if(isset($_POST)){
 	$registry->post=$_POST;
 }
 
 /*** load up the template ***/
 $registry->template = new template($registry, $request);

 /*** load the controller ***/
 $registry->router->loader();
 

?>
