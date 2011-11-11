<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

$mail=array('receiver'=>'an_email@example.com', 'sender'=>'a_reciever@example.com', 'subject'=>'Test Message', 'message'=>'Hello World');
PVMail::sendEmailPHP($mail);
