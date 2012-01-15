<?php
//Include the DEFINES and boo the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Audio Content Example With File</title>
	</head>
	<body>
		<?php
		
		//Set Content Variables
		$args = array(
			'content_type' => 'example_content_audio', 
			'content_title' => 'A sampleImage', 
			'content_description' => 'This is my first example content', 
			'audio_src' => 'http://www.youtube.com/watch?v=Dm1Wr-BeGBE', 
			'audio_length' => '10:21', 
		);
		
		$content_id = PVContent::createAudioContent($args);
		
		//Set Content Variables With File and Conversion Options
		$args = array(
			'content_type' => 'example_content_audio', 
			'content_title' => 'A sampleImage', 
			'content_description' => 'This is my first example content', 
			'file_name' => 'My Sample Audio', 
			'tmp_name' => 'example_files/sample_audio.mp3', 
			'file_size' => filesize('example_files/sample_audio.mp3'), 
			'file_type' => PVFileManager::getFileMimeType('example_files/sample_audio.mp3'),
			'convert_to_ogg' => true, 
			'convert_to_wav' => true, 
		);
		
		$content_id = PVContent::createAudioContentWithFile($args);
		?>

		<p>
			Recently created content ID: <?php  echo $content_id;?>
		</p>
		<?php
		//Search for content based on content_type and file type
		$search_args = array('content_type' => 'example_content_audio', 'file_type' => 'audio/mp3');
		//Get the Content List
		$content_list = PVContent::getAudioContentList($search_args);
		?>
		<hr />
		<p>
			Search arguments for content: 			
			<pre><?php print_r($search_args);?></pre>
		</p>
		<p>
			Array of data retrieved from database based on search arguments: 			
			<pre><?php print_r($content_list);?></pre>
		</p>
		<hr />
		<p>
			Iteratre through content list
		</p>
		<?php
		foreach ($content_list as $key => $value) {
			echo '<strong>Content ID:</strong> ' . $value['content_id'] . '<br />';
			echo '<strong>Content Title:</strong> ' . $value['content_title'] . '<br />';
			echo '<strong>Date Created:</strong> ' . $value['date_created'] . '<br /><br />';
			echo '<strong>Audio Duration:</strong> ' . PVAudio::getDuration('example_files/sample_audio.mp3') . '<br /><br />';
		}//end foreach

		//Retrive the Content based upon the ID
		$content = PVContent::getAudioContent($content_id);

		//Get the Content Value
		$content_title = $content['content_title'];
		?>

		<hr />
		<p>
			Display the recently created image
		</p>
		<?php
		//Display Audio Tag in HTML5
		echo PVHtml::audio('', $content);

		//Update the Content with the same values but only changing the audio length
		$content['audio_length'] = '5:11';
		PVContent::updateAudioContent($content);

		//Delete Content
		//PVContent::deleteContent($content_id);

		echo '<p>Audio Content Example Finished</p>';
		?>
	</body>
</html>
