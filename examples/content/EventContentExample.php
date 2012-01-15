<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Event Content Example</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content_event',  
			'content_title'=>'ProdigyView Bootcamp', 
			'content_description'=>'A bootcamp for prodigyview coming to a computer near you',
			'event_start_date'=>date("Y-m-d", mktime(0, 0, 0, date("m", time()), date("d", time())+2, date("Y", time()) )),
			'event_end_date'=>date("Y-m-d", mktime(0, 0, 0, date("m", time()), date("d", time())+10, date("Y", time()) )),
			'event_city'=>'New York'
		);
		?>
		
		<p>Content fields that are going to be created:<pre><?php print_r($args); ?></pre></p>
		
		<?php
		//Create a Unique Alias
		$content_alias=PVContent::createUniqueContentAlias('sample_alias');
		//Add Alias to To Arguements
		$args['content_alias']=$content_alias;
		//Create Content and Retrieve ID
		$content_id=PVContent::createEventContent($args);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Search for content based on content_type
		$search_args=array('content_type'=>'example_content_event', 'event_city' => 'New York');
		//Get the Content List
		$content_list=PVContent::getEventContentList($search_args);
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
			echo '<strong>Start Date:</strong> '.date( 'F j, Y, g:i a',strtotime($value['event_start_date'])).'<br /><br />';
			echo '<strong>End Date:</strong> '.date( 'F j, Y, g:i a',strtotime($value['event_end_date'])).'<br /><br />';
			echo '<strong>Location:</strong> '.$value['event_city'].'<br />';
		}//end foreach
		
		//Retrive the Content based upon the ID
		$content=PVContent::getEventContent($content_id);
		//Other way for Getting the Content
		$content=PVContent::getEventContent(PVContent::getContentIDByContentAlias($content_alias));
		//Get the Content Value
		$content_title=$content['content_title'];
		
		//Update the Content with the same values but only changing owner id
		$content['event_city'] = 'Chicago';
		PVContent::updateEventContent($content);
		
		//Delete Content
		//PVContent::deleteContent($content_id);
		
		echo '<p>Content Example Finished</p>';
		?>
	</body>
</html> 