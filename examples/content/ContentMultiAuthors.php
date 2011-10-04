<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Content Mutli-Author Example</title>
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
		
		$content=PVContent::getContent($content_id);
		?>
		
		<p>Recently created content ID: <?php echo $content_id; ?></p>
		
		<?php
		//Create A user
		$args=array(
			'user_email'=>'bob@example.com',
		);
		
		$user_id_1=PVUsers::addUser($args);
		$bob=PVUsers::getUserInfo('bob@example.com');
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_1; ?></p>
		
		<?php
		
		//Create A user
		$args=array(
			'user_email'=>'janet@example.com',
		);
		$user_id_2=PVUsers::addUser($args);
		$janet=PVUsers::getUserInfo('janet@example.com');
		?>
		
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_2; ?></p>
		
		<?php
		
		//Create A user
		$args=array(
			'user_email'=>'sparky@example.com',
		);
		$user_id_3=PVUsers::addUser($args);
		$sparkey=PVUsers::getUserInfo('sparky@example.com');
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_3; ?></p>
		<br />
		<p>Adding users to content as authors....</p>
		<?php
		//Adding Authors
		PVContent::addContentMultiAuthor($bob['user_id'], $content['content_id'], 'Main Author');
		PVContent::addContentMultiAuthor($janet['user_id'], $content['content_id'], 'Co-Author');
		
		//Check Authors
		$has_relationship= (PVContent::isContentMultiAuthor($bob['user_id'], $content['content_id'])) ? ' is an author': ' is not an author';
		?>
		<p><?php echo $bob['username'].$has_relationship; ?></p>
		<?php
		
		$has_relationship= (PVContent::isContentMultiAuthor($janet['user_id'], $content['content_id'])) ? ' is an author': ' is not an author';
		?>
		<p><?php echo $janet['username'].$has_relationship; ?></p>
		<?php
		
		$has_relationship= (PVContent::isContentMultiAuthor($sparkey['user_id'], $content['content_id'])) ? ' is an author': ' is not an author';
		?>
		<p><?php echo $sparkey['username'].$has_relationship; ?></p>
		<br />
		<p>Iteratate through content list</p>
		<?php
		foreach(PVContent::getContentMutliAuthorList(array('content_id'=>$content_id, 'join_users'=>true)) as $author) {
			?>
			<p>Author name: <?php echo $author['username']; ?> and author status: <?php echo $author['author_status']; ?></p>
			<?php
		}
		//Remove Content Authors
		PVContent::removeContentMultiAuthor($user_id_1, $content_id);
		PVContent::removeContentMultiAuthor($user_id_2, $content_id);
		PVContent::removeContentMultiAuthor($user_id_3, $content_id);
		
		PVUsers::deleteUser($user_id_1);
		PVUsers::deleteUser($user_id_2);
		PVUsers::deleteUser($user_id_3);
		//Delete Content
		pv_deleteContent($content_id);
		
		echo '<p>End Content Multi-Author Example Finished</p>';
		?>
	</body>
</html> 