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
PVAudio::init($config);

$audio_file = PV_ROOT.DS.'examples'.DS.'content'.DS.'example_files'.DS.'sample_audio.mp3';

PVAudio::convertAudioFile($audio_file, PV_ROOT.PV_AUDIO.'sampe_audio_1.wav');


$options = array(
	'output_an' => true
);
//Disable the audio of the file
PVAudio::convertAudioFile($audio_file, PV_ROOT.PV_AUDIO.'sampe_audio_2.mp3', $options);

$options = array(
	'output_acodec' => 'libvorbis'
);
//Convert to sample_audio using a code
PVAudio::convertAudioFile($audio_file, PV_ROOT.PV_AUDIO.'sampe_audio_2.ogg', $options);

$options = array(
	'output_ab' => '160k'
);
//Lower the bit rate to 160k
PVAudio::convertAudioFile($audio_file, PV_ROOT.PV_AUDIO.'compressed_1.mp3', $options);

$options = array(
	'output_ab' => '128k',
	'output_ss' => '00:00:30'
);
//Lower the bit rate to 128k and start coding
PVAudio::convertAudioFile($audio_file, PV_ROOT.PV_AUDIO.'compressed_2.mp3', $options);

$options = array(
	'output_ab' => '96k',
	'output_ss' => '00:00:20',
	'output_t' => '25'
);
//Lower the bit rate to 96k, start at 20 seconds and convert only 25 seconds
PVAudio::convertAudioFile($audio_file, PV_ROOT.PV_AUDIO.'compressed_3.mp3', $options);

