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


$options = array(
	'output_vcodec' => 'libtheora'
);
//Convert the video to new format and set save location
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'video_2.ogv', $options);

$options = array(
	'output_ss' => '00:0:20',
);
//Convert the video to new format and have the video start 20 seconds late
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'video_2.avi', $options);

$options = array(
	'output_ss' => '00:0:30',
	'output_t' => '30'
);
//Convert the video to new format and have the video start 30 seconds late
//run for 30 secods
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'video_3.avi', $options);


$options = array(
	'output_r' => '1',
	'output_vframes'=> '20',
	'output_f' => 'image2'
);
//Convert the video to an image and only output 20 images
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'image-%3d.jpeg', $options);

$options = array(
	'output_r' => '1',
	'output_vframes'=> '10',
	'output_f' => 'image2',
	'output_ss' => '00:02:15',
	'output_t' => '20'
);
//Convert the video to an image, start at 2 minutes, go for 2- 10 seconds
PVVideo::convertVideoFile($video_file , PV_ROOT.PV_VIDEO.'image2-%3d.jpeg', $options);
