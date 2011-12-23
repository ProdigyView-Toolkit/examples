<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World'
);

PVMail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com'
);

PVMail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'carboncopy' => 'larry@example.com',
	'blindcopy' => 'karen@example.com'
);

PVMail::sendEmail($mail);


$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'carboncopy' => 'larry@example.com',
	'blindcopy' => 'karen@example.com',
	'reply_to' => 'support@example.com'
);

PVMail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'carboncopy' => 'larry@example.com',
	'blindcopy' => 'karen@example.com',
	'reply_to' => 'support@example.com',
	'errors_to' => 'tech@example.com'
);

PVMail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'carboncopy' => 'larry@example.com',
	'blindcopy' => 'karen@example.com',
	'reply_to' => 'support@example.com',
	'message_id' => 'XR5-3029@example.com'
);

PVMail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'html_message' => '<strong>Hello</strong> <p>Your bill has been paid, thank you. </p>',
	'text_message' => 'Hello,\n <p>Your bill has been paid, thank you.',
);

PVMail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'attachment' => '/images/my_image.jpeg',
);

PVMail::sendEmail($mail);