<?php
//Include the DEFINES and boo the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_BootCompleteSystem.php');

if(isset($_POST)) {
	echo 'A form has been submitted';
}

echo PVForms::formBegin();

echo PVForm::formEnd();
