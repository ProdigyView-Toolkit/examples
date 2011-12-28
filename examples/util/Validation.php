<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//PVValidator has a lot of validation checks
//The ones in this example are only a select few of the many

$valid = PVValidator::isInteger(3);
echo ($valid) ? '<p>Value is an integer</p>' : '<p>Value is not an integer</p>';

$valid = PVValidator::isInteger('r');
echo ($valid) ? '<p>Value is an integer</p>' : '<p>Value is not an integer</p>';


$valid = PVValidator::isDouble(3.2);
echo ($valid) ? '<p>Value is a double</p>' : '<p>Value is not a double</p>';

$valid = PVValidator::isDouble(5);
echo ($valid) ? '<p>Value is a double</p>' : '<p>Value is not a double</p>';


$valid = PVValidator::isValidEmail('example@aol.com');
echo ($valid) ? '<p>Value is a valid email</p>' : '<p>Value is not a valid email</p>';

$valid = PVValidator::isValidEmail('someone@');
echo ($valid) ? '<p>Value is a valid email</p>' : '<p>Value is not a valid email</p>';



$valid = PVValidator::isAudioFile('audio/mpeg');
echo ($valid) ? '<p>Value is an audio mime type</p>' : '<p>Value is not an audio mime type</p>';

$valid = PVValidator::isAudioFile('text');
echo ($valid) ? '<p>Value is an audio mime type</p>' : '<p>Value is not an audio mime type</p>';



$valid = PVValidator::isImageFile('image/gif');
echo ($valid) ? '<p>Value is an image mime type</p>' : '<p>Value is not an image mime type</p>';

$valid = PVValidator::isImageFile('audio/mpeg');
echo ($valid) ? '<p>Value is an image mime type</p>' : '<p>Value is not an image mime type</p>';



$valid = PVValidator::isVideoFile('video/webm');
echo ($valid) ? '<p>Value is an video mime type</p>' : '<p>Value is not an video mime type</p>';

$valid = PVValidator::isVideoFile('audio/x-wav');
echo ($valid) ? '<p>Value is an video mime type</p>' : '<p>Value is not an video mime type</p>';



$valid = PVValidator::isCompressedFile('application/zip');
echo ($valid) ? '<p>Value is an compressed file mime type</p>' : '<p>Value is not an compressed file mime type</p>';

$valid = PVValidator::isCompressedFile('video/ogv');
echo ($valid) ? '<p>Value is an compressed file mime type</p>' : '<p>Value is not an compressed file mime type</p>';



$valid = PVValidator::isMicrosoftWordDocFile('application/vnd.ms-excel');
echo ($valid) ? '<p>Value is an MS Word mime type</p>' : '<p>Value is not an MS Word mime type</p>';

$valid = PVValidator::isMicrosoftWordDocFile('application/x-zip');
echo ($valid) ? '<p>Value is an MS Word mime type</p>' : '<p>Value is not an MS Word mime type</p>';