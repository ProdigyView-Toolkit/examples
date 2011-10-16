<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Comments Example</title>
	</head>
	<body>
		<?php
		//Set Content Variables
		$args=array(
			'content_type'=>'example_content',  
			'content_title'=>'Example Content Title', 
			'content_description'=>'In this doc we are going to add some comments.'
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
		
		$comment_args=array(
			'content_id'=>$content_id,
			'owner_id'=>12,
			'comment_text'=>'Totally awesome man!',
			'comment_type'=>'test_comment'
		);
		
		$comment_id=PVComments::addComment($comment_args);
		
		$comment_args_2=array(
			'content_id'=>$content_id,
			'owner_id'=>12,
			'comment_text'=>'Totally awesome man!',
			'comment_type'=>'test_comment',
			'comment_parent'=>$comment_id
		);
		
		$comment_id_2=PVComments::addComment($comment_args_2);
		
		$comment_list=PVComments::getCommentList(array('comment_type'=>'test_comment'));
		
		foreach($comment_list as $comment) {
			?>
			<pre>
				<?php print_r($comment);?>
			</pre>
			<?php
			$comment['comment_approved']=1;
			PVComments::updateComment($comment);
		}
		
		$comment_list=PVComments::getCommentList(array('comment_approved'=>1));
		
		foreach($comment_list as $comment) {
			?>
			<pre>
				<?php print_r($comment);?>
			</pre>
			<?php
			PVComments::deleteComment($comment['comment_id']);
		}
		
		PVContent::deleteContent($content_id);
		
		
		?>
		<p>End Comments Example</p>
	</body>
</html> 