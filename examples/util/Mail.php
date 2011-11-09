<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

$mail=array('receiver'=>'devin.dixon22@gmail.com', 'sender'=>'contact@phonefare.com', 'subject'=>'Test Message', 'message'=>'Hello World');
PVMail::sendEmailPHP($mail);
