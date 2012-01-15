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
			'content_title'=>'A Youtube Video: What She Say', 
			'content_description'=>'If someone can make sense of this answer, please tell me',
			'video_src'=>'http://www.youtube.com/watch?v=lj3iNxZ8Dww',
			'video_allow_embedding' => 1,
			'video_length' => '0:48'
		);
	
		$content_id = PVContent::createVideoContent($args);
		
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content_video',  
			'content_title'=>'A Sample Video', 
			'content_description'=>'This is my first example of video content',
			'file_name'=>'Marvel/DC After Hours',
			'tmp_name'=>'example_files/sample_video.mp4',
			'file_size'=>filesize('example_files/sample_video.mp4'),
			'file_type'=>PVFileManager::getFileMimeType('example_files/sample_video.mp4'),
			'convert_to_ogv'=>true,
			'convert_to_webm'=>true,
		);
		
		$content_id = PVContent::createVideoContentWithFile($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Search for content based on content_type and set the order
		$search_args=array('content_type'=>'example_content_video', 'order_by' => 'video_length');
		//Get the Content List
		$content_list=PVContent::getVideoContentList($search_args);
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
			echo '<strong>OGV File:</strong> '.$value['ogv_file'].'<br /><br />';
			echo '<strong>WebM File:</strong> '.$value['webm_file'].'<br /><br />';
			echo '<strong>MP4 File:</strong> '.$value['mp4_file'].'<br /><br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content=PVContent::getVideoContent($content_id);
		
		//Get the Content Value
		$content_title=$content['content_title'];
		?>
		
		<hr />
		<p>Display the recently created image</p>
		
		<?php
		//Display Video in HTML5 Form
		echo PVHtml::video('', $content);
		
		//Update the Content with the same values but only the video length
		$content['video_length'] = '3:40';
		PVContent::updateVideoContent($content);
		
		//Delete Content
		//PVContent::deleteContent($content_id);
		
		echo '<p>VideoContent Example Finished</p>';
		?>
	</body>
</html> 