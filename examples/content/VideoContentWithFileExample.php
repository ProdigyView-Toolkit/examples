<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Audio Content Example With File</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content_video',  
			'content_title'=>'A Sample Video', 
			'content_description'=>'This is my first example of video content',
			'file_name'=>'Marvel/DC After Hours',
			'tmp_name'=>'example_files/sample_video.mp4',
			'file_size'=>filesize('example_files/sample_video.mp4'),
			'file_type'=>'video/mp4',
			'convert_to_ogv'=>true,
			'convert_to_webm'=>true,
		);
		?>
		
		<p>Content fields that are going to be created:<pre><?php print_r($args); ?></pre></p>
		
		<?php
		//Create a Unique Alias
		$content_alias=pv_createUniqueContentAlias('sample_alias');
		//Add Alias to To Arguements
		$args['content_alias']=$content_alias;
		//Create Image Content and Retrieve ID
		$content_id=PVContent::createVideoContentWithFile($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Search for content based on content_type
		$search_args=array('content_type'=>'example_content_video');
		//Get the Content List
		$content_list=pv_getContentVideoList($search_args);
		?>
		<hr />
		<p>Search arguments for content:<pre><?php print_r($search_args);?></pre></p>
		<p>Array of data retrieved from database based on search arguments:<pre><?php print_r($content_list);?></pre> </p>
		<hr />
		<p>Iteratre through content list</p>
		
		<?php
		foreach($content_list as $key=>$value){
			echo '<strong>Content ID:</strong> '.$value['content_id'].'<br />';
			echo '<strong>Content Title:</strong> '.$value['content_title'].'<br />';
			echo '<strong>Date Created:</strong> '.$value['date_created'].'<br /><br />';
			echo '<strong>Audio Duration:</strong> '.PVAudioRenderer::getDuration('example_files/sample_audio.mp3').'<br /><br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content=pv_getVideoContent($content_id);
		
		//Get the Content Value
		$content_title=$content['content_title'];
		?>
		
		<hr />
		<p>Display the recently created image</p>
		
		<?php
		//Display Image
		echo PVHtml::video('', $content);
		
		//Update the Content with the same values but only changing owner id
		$content['owner_id']=5;
		pv_updateVideoContent($content);
		
		//Delete Content
		//pv_deleteContent($content_id);
		
		echo '<p>VideoContent Example Finished</p>';
		?>
	</body>
</html> 