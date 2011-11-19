<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');


/**
 * Before running this example, please note that your server will require ffmpeg or another conversion
 * tool to be installed and running.
 */

//FFMPEG may reside in different locations depending on your server setup. You can specify the location of the converter
//when initializing the class
$configuration = array('converter'=>'ffmpeg');
PVAudioRenderer::init($configuration);

//Path to our video file we want to manipulate
$video_file = PV_ROOT.'examples/content/example_files/sample_video.mp4';


//The function is designed to use the ffmpeg command line. Arguements passed in the options must adhere
//the options specified at http://www.ffmpeg.org/ffmpeg.html
//Options for the input video begin with a prefix of input_
//Options for the output video begin with prefix output_

$options=array('output_ar');
PVVideoRenderer::convertVideoFile($current_file_location, $new_file_location, $options);
