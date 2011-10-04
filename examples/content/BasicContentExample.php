<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Base Content Example</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content',  
			'content_title'=>'Example Content Title', 
			'content_description'=>'This is my first example content'
		);
		?>
		
		<p>Content fields that are going to be created:<pre><?php print_r($args); ?></pre></p>
		
		<?php
		//Create a Unique Alias
		$content_alias=pv_createUniqueContentAlias('sample_alias');
		//Add Alias to To Arguements
		$args['content_alias']=$content_alias;
		//Create Content and Retrieve ID
		$content_id=pv_createContent($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Search for content based on content_type
		$search_args=array('content_type'=>'example_content');
		//Get the Content List
		$content_list=pv_getContentList($search_args);
		?>
		<hr />
		<p>Search arguments for content:<pre><?php print_r($search_args);?></pre></p>
		<p>Array of data retrieved from database based on search arguments:<pre><?php print_r($content_list);?></pre> </p>
		<hr />
		<p>Iteratre through contentlist</p>
		
		<?php
		foreach($content_list as $key=>$value){
			echo '<strong>Content ID:</strong> '.$value['content_id'].'<br />';
			echo '<strong>Content Title:</strong> '.$value['content_title'].'<br />';
			echo '<strong>Date Created:</strong> '.$value['date_created'].'<br /><br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content=pv_getContent($content_id);
		//Other way for Getting the Content
		$content=pv_getContent(pv_getContentIDByContentAlias($content_alias));
		//Get the Content Value
		$content_title=$content['content_title'];
		
		//Update the Content with the same values but only changing owner id
		$content['owner_id']=5;
		pv_updateContent($content);
		
		//Delete Content
		pv_deleteContent($content_id);
		
		echo '<p>Content Example Finished</p>';
		?>
	</body>
</html> 