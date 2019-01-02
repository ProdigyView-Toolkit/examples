<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World'
);

Mail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com'
);

Mail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'carboncopy' => 'larry@example.com',
	'blindcopy' => 'karen@example.com'
);

Mail::sendEmail($mail);


$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'carboncopy' => 'larry@example.com',
	'blindcopy' => 'karen@example.com',
	'reply_to' => 'support@example.com'
);

Mail::sendEmail($mail);

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

Mail::sendEmail($mail);

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

Mail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'html_message' => '<strong>Hello</strong> <p>Your bill has been paid, thank you. </p>',
	'text_message' => 'Hello,\n <p>Your bill has been paid, thank you.',
);

Mail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'attachment' => '/images/my_image.jpeg',
);

Mail::sendEmail($mail);

$mail=array(
	'receiver'=>'bob@example.com', 
	'subject'=>'Test Message', 
	'message'=>'Hello World',
	'sender' => 'susan@example.com',
	'attachment' => array('/images/my_image.jpeg', '/images/second_image.jpeg'),
);

Mail::sendEmail($mail);