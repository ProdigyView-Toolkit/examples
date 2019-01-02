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

//Create an article
echo Html::article('Welcome to the html5 demonstration!', array('id' => 'my_article'));

//Create an aside
echo Html::aside('Click around to see some features', array( 'class' => 'side-bar' ));

//Create a details
echo Html::details('More infomration will be hidden here.');

//Show a progress bar
echo Html::progress(30, 100);
echo '<br />';

//Display the time
echo Html::time('3:45');
echo '<br />';

//Show a summary
echo Html::details( 
		Html::summary('Briefly summurize what happened').
		Html::p('And that is what happened')
		);
echo '<br />';

//Dispay a convas area
echo Html::canvas('Turn on your javascript', array('id' => 'my_canvas', 'width' => 200, 'height' => 300));
echo '<br />';

//Play an audio file
echo Html::audio('audio.mp3', array('mp3_file' => 'audio.mp3', 'wav_file' => 'audio.wav', 'oga_file' => 'audio.oga'));
echo '<br />';

//Display a video file
echo Html::video('video.mp4', array('mp4_file' => 'video.mp4', 'ogv_file' => 'video.ogv', 'webm_file' => 'video.webm'));
echo '<br />';
