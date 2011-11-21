<?php
//Initliaze the security class. Add adapters filters, observers, and to filters

$security_config = array(		
	'mcrypt_key' => 'avdvsdv324', 
	'mcrypt_iv' => '394nf033'
);

PVSecurity::init($security_config);
