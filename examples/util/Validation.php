<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//PVValidator has a lot of validation checks
//The ones in this example are only a select few of the many

$valid = PVValidator::isInteger(3);
echo ($valid) ? '<p>Value is an integer</p>' : '<p>Value is not an integer</p>';

$valid = PVValidator::isInteger('r');
echo ($valid) ? '<p>Value is an integer</p>' : '<p>Value is not an integer</p>';


$valid = PVValidator::isDouble(3.2);
echo ($valid) ? '<p>Value is a double</p>' : '<p>Value is not a double</p>';

$valid = PVValidator::isDouble('r');
echo ($valid) ? '<p>Value is a double</p>' : '<p>Value is not a double</p>';


$valid = PVValidator::isValidEmail(3.2);
echo ($valid) ? '<p>Value is a valid email</p>' : '<p>Value is not a valid email</p>';

$valid = PVValidator::isValidEmail('r');
echo ($valid) ? '<p>Value is a valid email</p>' : '<p>Value is not a valid email</p>';



$valid = PVValidator::isAudioFile('audio/mpeg');
echo ($valid) ? '<p>Value is an audio mime type</p>' : '<p>Value is not an audio mime type</p>';

$valid = PVValidator::isAudioFile('text');
echo ($valid) ? '<p>Value is an audio mime type</p>' : '<p>Value is not an audio mime type</p>';



$valid = PVValidator::isImageFile('audio/mpeg');
echo ($valid) ? '<p>Value is an audio mime type</p>' : '<p>Value is not an audio mime type</p>';

$valid = PVValidator::isImageFile('text');
echo ($valid) ? '<p>Value is an audio mime type</p>' : '<p>Value is not an audio mime type</p>';



$valid = PVValidator::isVideoFile('audio/mpeg');
echo ($valid) ? '<p>Value is an video mime type</p>' : '<p>Value is not an video mime type</p>';

$valid = PVValidator::isVideoFile('text');
echo ($valid) ? '<p>Value is an video mime type</p>' : '<p>Value is not an video mime type</p>';



$valid = PVValidator::isCompressedFile('audio/mpeg');
echo ($valid) ? '<p>Value is an compressed file mime type</p>' : '<p>Value is not an compressed file mime type</p>';

$valid = PVValidator::isCompressedFile('text');
echo ($valid) ? '<p>Value is an compressed file mime type</p>' : '<p>Value is not an compressed file mime type</p>';



$valid = PVValidator::isMicrosoftWordDocFile('audio/mpeg');
echo ($valid) ? '<p>Value is an MS Word mime type</p>' : '<p>Value is not an MS Word mime type</p>';

$valid = PVValidator::isMicrosoftWordDocFile('text');
echo ($valid) ? '<p>Value is an MS Word mime type</p>' : '<p>Value is not an MS Word mime type</p>';