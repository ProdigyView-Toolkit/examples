<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

$audio_file = PV_ROOT.DS.'examples'.DS.'content'.DS.'example_files'.DS.'sample_audio.mp3';

//Path To your FFMPEG
$ffmpeg = 'ffmpeg';

//Convert the file to the same format with different name
exec($ffmpeg.' -i '.$audio_file.' '.PV_ROOT.PV_AUDIO.'audio_sample.mp3');

//Convert the file to a different format
exec($ffmpeg.' -i '.$audio_file.' '.PV_ROOT.PV_AUDIO.'audio_sample_1.wav');

//Convert the file to the same format with different name
exec($ffmpeg.' -i '.$audio_file.' -b 128k '.PV_ROOT.PV_AUDIO.'audio_sample_2.wav');

//Record the sound coming in from a device and save it to an mp3
exec($ffmpeg.' -f oss -i /dev/dsp '.PV_ROOT.PV_AUDIO.'recorded_sound.mp3');

//Convert a text file into sound and listen to it
exec($ffmpeg.' -i cat .'.PV_ROOT.'README.txt > /dev/dsp '.PV_ROOT.PV_AUDIO.'recorded_file_sound.mp3');
