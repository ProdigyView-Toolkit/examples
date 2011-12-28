<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

$video_file = PV_ROOT.DS.'examples'.DS.'content'.DS.'example_files'.DS.'sample_video.mp4';

//Path To your FFMPEG
$ffmpeg = 'ffmpeg';

//Convert the file to the same format with different name
exec($ffmpeg.' -i '.$video_file.' '.PV_ROOT.PV_VIDEO.'sample1.mp4');

//Convert the video but change the aspect and keep the same format
exec($ffmpeg.' -i '.$video_file.' -aspect 4:3 '.PV_ROOT.PV_VIDEO.'sample2.mp4');

//Convert the file but change the format
exec($ffmpeg.' -i '.$video_file.' '.PV_ROOT.PV_VIDEO.'sample1.avi');

//Crop Video in different format
exec($ffmpeg.' -i '.$video_file.' -croptop 20 -cropbottom 20 -cropleft 10 -cropright 10 '.PV_ROOT.PV_VIDEO.'sample2.avi');

//Crop Video in different format
exec($ffmpeg.' -i '.$video_file.' -padtop 30  -padbottom 30  -padcolor 5A6351 '.PV_ROOT.PV_VIDEO.'sample3.avi');
