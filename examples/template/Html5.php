<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

echo PVHtml::article('');
