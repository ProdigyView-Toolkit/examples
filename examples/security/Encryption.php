<?php
//Turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('UTC');

//Include the DEFINES and boot on the core componets.
//Do not initialize any of the other classes, that will be done manually
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

Security::init();

$string = 'I saw Susie sitting in a shoe shine shop.
Where she sits she shines, and where she shines she sits.';

echo $string.'<br />';

$encrypted_string = Security::encrypt($string);
echo $encrypted_string.'<br />';

$decrypted_string = Security::decrypt($encrypted_string);
echo $decrypted_string.'<br />';

$encrypted_string = Security::encrypt($string, array('mcrypt_key' => 'Lamba1RSF'));
echo $encrypted_string.'<br />';

$decrypted_string = Security::decrypt($encrypted_string);
echo $decrypted_string.'<br />';

$decrypted_string = Security::decrypt($encrypted_string, array('mcrypt_key' => 'Lamba1RSF'));
echo $decrypted_string.'<br />';



