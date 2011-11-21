<?php
 /*** include the controller class ***/
 include __SITE_PATH . '/application/' . 'controller.class.php';

 /*** include the registry class ***/
 include __SITE_PATH . '/application/' . 'registry.class.php';

 /*** include the router class ***/
 include __SITE_PATH . '/application/' . 'router.class.php';

 /*** include the template class ***/
 include __SITE_PATH . '/application/' . 'template.class.php';
 
  /*** include the template class ***/
 include __SITE_PATH . '/application/' . 'model.class.php';
 
 function loadModels($class) {
	$filename = $class. '.php';
	$file =__SITE_PATH.'model'.DS.$filename;
	
	if (!file_exists($file)) {
		return false;
	}
	require_once $file;
	return true;
}
 
spl_autoload_register('loadModels');


 /*** a new registry object ***/
 $registry = new registry;
 
 $request = new PVCollection($_REQUEST);

 /*** create the database registry object ***/
 // $registry->db = db::getInstance();

?>
