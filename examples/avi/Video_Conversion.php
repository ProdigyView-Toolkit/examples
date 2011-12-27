<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//Set the location of ffmpeg on your server
$config = array('converter' => 'ffmpeg');
PVVideo::init($config);

$video_file = PV_ROOT.DS.'examples'.DS.'content'.DS.'example_files'.DS.'sample_video.mp4';

//Convert the video to new format and set save location
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'video_1.mp4');


$output_options = array(
	'output_'
);
//Convert the video to new format and set save location
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'video_2.mp4');
