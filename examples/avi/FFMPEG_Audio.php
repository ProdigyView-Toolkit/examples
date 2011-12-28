<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

$audio_file = PV_ROOT.DS.'examples'.DS.'content'.DS.'example_files'.DS.'sample_audio.mp3';
echo $audio_file.'<br />';
echo PV_ROOT.PV_AUDIO.'sample1.mp4';

//Path To your FFMPEG
$ffmpeg = 'ffmpeg';

//Convert the file to the same format with different name
exec($ffmpeg.' -i '.$audio_lfile.' '.PV_ROOT.PV_AUDIO.'audio_sample.wav');

//Convert the file to the same format with different name
exec($ffmpeg.' -i '.$audio_lfile.' -b 128k '.PV_ROOT.PV_AUDIO.'audio_sample.wav');