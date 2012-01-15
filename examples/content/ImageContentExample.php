<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Image Content Example</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content_image',  
			'content_title'=>'Example Content Title', 
			'content_description'=>'This is my first example content',
			'image_url'=>'http://www.prodigyview.com/media/images/prodigyview_logo.png',
		);
		?>
		
		<p>Content fields that are going to be created:<pre><?php print_r($args); ?></pre></p>
		
		<?php
		//Create a Unique Alias
		$content_alias = PVContent::createUniqueContentAlias('sample_alias');
		//Add Alias to To Arguements
		$args['content_alias'] = $content_alias;
		//Create Image Content and Retrieve ID
		$content_id = PVContent::createImageContent($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Search for content based on content_type
		$search_args=array('content_type'=>'example_content_image');
		//Get the Content List
		$content_list=PVContent::getImageContentList($search_args);
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
			echo '<strong>Image Url:</strong> '.$value['image_url'].'<br /><br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content = PVContent::getImageContent($content_id);
		//Get the Content Value
		$content_title = $content['content_title'];
		?>
		
		<hr />
		<p>Display the recently created image</p>
		
		<?php
		//Display Image
		echo PVHtml::image($content['image_url'], array('onclick'=>'alert(\'This is pretty cool!\');'));
		
		//Update the Content with the same values but only changing owner id
		$content['owner_id']=5;
		PVContent::updateImageContent($content);
		
		//Delete Content
		PVContent::deleteContent($content_id);
		
		echo '<p>Image Content Example Finished</p>';
		?>
	</body>
</html> 