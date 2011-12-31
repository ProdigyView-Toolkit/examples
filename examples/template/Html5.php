<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 
date_default_timezone_set('UTC');

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

/**
 * A Note Before Hand!
 * 
 * HTML5 is still in development and all of these functions WILL NOT
 * work as intended on every browser.
 */

//Create an article
echo PVHtml::article('Welcome to the html5 demonstration!', array('id' => 'my_article'));

//Create an aside
echo PVHtml::aside('Click around to see some features', array( 'class' => 'side-bar' ));

//Create a details
echo PVHtml::details('More infomration will be hidden here.');

//Show a progress bar
echo PVHtml::progress(30, 100);
echo '<br />';

//Display the time
echo PVHtml::time('3:45');
echo '<br />';

//Show a summary
echo PVHtml::details( 
		PVHtml::summary('Briefly summurize what happened').
		PVHtml::p('And that is what happened')
		);
echo '<br />';

//Dispay a convas area
echo PVHtml::canvas('Turn on your javascript', array('id' => 'my_canvas', 'width' => 200, 'height' => 300));
echo '<br />';

//Play an audio file
echo PVHtml::audio('audio.mp3', array('mp3_file' => 'audio.mp3', 'wav_file' => 'audio.wav', 'oga_file' => 'audio.oga'));
echo '<br />';

//Display a video file
echo PVHtml::video('video.mp4', array('mp4_file' => 'video.mp4', 'ogv_file' => 'video.ogv', 'webm_file' => 'video.webm'));
echo '<br />';
