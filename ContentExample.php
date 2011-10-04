<?php
include_once('DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Set Content Variables
$args=array(
	'content_type'=>'example_content',  
	'content_title'=>'Example Content Title', 
	'content_description'=>'This is my first example content'
);
//Create a Unique Alias
$content_alias=pv_createUniqueContentAlias('sample_alias');
//Add Alias to To Arguements
$args['content_alias']=$content_alias;
//Create Content and Retrieve ID
$content_id=pv_createContent($args);

//Search for content based on content_type
$search_args=array('content_type'=>'example_content');
//Get the Content List
$content_list=pv_getContentList($search_args);
foreach($content_list as $key=>$value){
	$temp_id=$value['content_id'];
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
?>