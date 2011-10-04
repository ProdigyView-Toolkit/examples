<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Text Content Example</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content_text',  
			'content_title'=>'Chapter 1', 
			'content_description'=>'Will Ryan find his ball?',
			'text_content'=>'Ryan kicked the ball clear over the bushes and into the woods. His mother warned him about going into the woods by Ryan really wanted his ball back.',
			'text_page_number'=>1
		);
		?>
		
		<p>Content fields that are going to be created:<pre><?php print_r($args); ?></pre></p>
		
		<?php
		//Create a Unique Alias
		$content_alias=pv_createUniqueContentAlias('sample_alias');
		//Add Alias to To Arguements
		$args['content_alias']=$content_alias;
		//Create Content and Retrieve ID
		$content_id=pv_createTextContent($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Add Another Page
		$args=array(
			'content_type'=>'example_content_text',  
			'content_title'=>'Chapter 2', 
			'content_description'=>'Will Ryan Rescue his cat?',
			'text_content'=>'Ryan saw his grandma\'s cat in the tree but was not sure how to rescue it.',
			'text_page_number'=>2
		);
		
		$content_id_2=pv_createTextContent($args);
		//Search for content based on content_type
		$search_args=array('content_type'=>'example_content_text', 'order_by'=>'text_page_number');
		//Get the Content List
		$content_list=pv_getContentTextList($search_args);
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
			echo '<strong>Text Content:</strong> '.$value['text_content'].'<br /><br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content=pv_getTextContent($content_id);
		//Other way for Getting the Content
		$content=pv_getTextContent(pv_getContentIDByContentAlias($content_alias));
		//Get the Content Value
		$content_title=$content['content_title'];
		
		//Update the Content with the same values but only changing owner id
		$content['text_content']=$content['text_content'].='Ryan leaped in the woods, got the ball and ran home!';
		pv_updateContent($content);
		
		//Delete Content
		pv_deleteContent($content_id);
		pv_deleteContent($content_id_2);
		
		echo '<p>Content Example Finsihed</p>';
		?>
	</body>
</html> 