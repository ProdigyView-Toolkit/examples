<?php
//Define Directory Seperator
define('DS', DIRECTORY_SEPARATOR);
//Define Prodigy View ROot
define('PV_ROOT', $_SERVER['DOCUMENT_ROOT']);
//Define Core Direcoty
define('PV_CORE', PV_ROOT.DS.'core'.DS);
//Define Applications Directory
define('PV_APPLICATIONS', PV_ROOT.DS.'apps'.DS.'front'.DS);
//Define Applications Admin Directory
define('PV_ADMIN_APPLICATIONS', PV_ROOT.DS.'apps'.DS.'admin'.DS);
//Define Modules Directory
define('PV_MODULES',  PV_ROOT.DS.'modules'.DS);
//Define Plugins Directory
define('PV_LIBRARIES',  PV_ROOT.DS.'resources'.DS.'libraries'.DS);
//Define Configuartion Directory
define('PV_PLUGINS',  PV_ROOT.DS.'plugins'.DS);
//Define MVC Directory
define('PV_MVC',  PV_ROOT.DS.'mvc'.DS);
//Define Site Configuration File
define('PV_CONFIG', PV_ROOT.'/config/site_config.xml');
//Define Database Configuration File
define('PV_DB_CONFIG', PV_ROOT.'/config/config.php');
//Define Error Log
define('PV_ERROR_LOG', PV_ROOT.'/tmp/'.'logs'.DS.'error.log');
//Define Template Directory
define('PV_TEMPLATES', PV_ROOT.DS.'resources'.DS.'templates'.DS);
//Define Javascript ROOT
define('PV_JAVASCRIPT', '/resources/javascript/');
//Define JQuery Root
define('PV_ADMIN_JAVASCRIPT', '/resources/javascript/');
//Define JQuery Root
define('PV_JQUERY', '/resources/jquery/');
//Define Prototype Root
define('PV_ADMIN_JQUERY', '/resources/jquery/');
//Define Prototype Root
define('PV_PROTOTYPE', '/resources/prototype/');
//Define Prototype Root
define('PV_ADMIN_PROTOTYPE', '/resources/prototype/');
//Define Mootools Root
define('PV_MOOTOOLS', '/resources/mootools/');
//Define Mootools Root
define('PV_ADMIN_MOOTOOLS', '/resources/mootools/');
//Define CSS Root
define('PV_CSS', '/resources/css/');
//Define CSS Root
define('PV_ADMIN_CSS', 'resources/css/');
//Define Image Direcoty
define('PV_IMAGE', '/media/images/');
//Define Video Direcoty
define('PV_VIDEO', '/media/video/');
//Define Audio Direcoty
define('PV_AUDIO', '/media/audio/');
//Define Audio Direcoty
define('PV_FILE', '/media/files/');
//Define is Admin
define('PV_IS_ADMIN', FALSE);
