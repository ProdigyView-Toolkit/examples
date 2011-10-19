<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>User Relationships Example</title>
	</head>
	<body>
		<?php
		//Create A list of users
		$args=array(
			'username'=>'John Doe',
			'user_email'=>'john@example.com',
		);
		
		$user_id_1=PVUsers::addUser($args);
		$john=PVUsers::getUserInfo($user_id_1);
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_1; ?></p>
		
		<?php
		
		//Create A user
		$args=array(
			'username'=>'Jane Doe',
			'user_email'=>'jane@example.com',
		);
		$user_id_2=PVUsers::addUser($args);
		$jane=PVUsers::getUserInfo($user_id_2);
		?>
		
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_2; ?></p>
		
		<?php
		
		//Create A user
		$args=array(
			'username'=>'Shaniqua Doe',
			'user_email'=>'shaniqua@example.com',
		);
		$user_id_3=PVUsers::addUser($args);
		$shaniqua=PVUsers::getUserInfo($user_id_3);
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_3; ?></p>
		
		<?php
		
		//Create A user
		$args=array(
			'username'=>'Xing Doe',
			'user_email'=>'xing@example.com'
		);
		$user_id_4=PVUsers::addUser($args);
		$xing=PVUsers::getUserInfo($user_id_4);
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_4; ?></p>
		
		<p>The Relationships</p>
		<?php
		//Relate the user who you want to have an relationshiop
		PVUsers::addUserRelationship($user_id_1, $user_id_2, 'married', 1 );
		
		PVUsers::addUserRelationship($user_id_3, $user_id_1, 'father-daughter', 1 );
		
		PVUsers::addUserRelationship($user_id_2, $user_id_4, 'mother-son', 1 );
		
		PVUsers::addUserRelationship($user_id_4, $user_id_3, 'cousins', 0 );
		
		//Search for the users
		$relationships=PVUsers::getUserRelationshipList(array('requesting_user'=>"$user_id_1,$user_id_3,$user_id_2,$user_id_4"));
		
		foreach($relationships as $relationship){
			$user1=PVUsers::getUserInfo($relationship['requesting_user']);
			$user2=PVUsers::getUserInfo($relationship['requested_user']);
			?>
			<p><strong><?php echo $user1['username']; ?> and <?php echo $user2['username']; ?> are 
			<?php echo $relationship['relationship_type']; ?></strong></p>
			<?php
			$has_relationship= (PVUsers::checkUserRelationship($relationship['requesting_user'], $user_id_1)) ? ' have a relation': ' have no relation';
			?>
			<p><?php echo $user1['username']; ?> and <?php echo $john['username'].' '.$has_relationship; ?></p>
			<?php
			$has_relationship= (PVUsers::checkUserRelationship($relationship['requesting_user'], $user_id_2)) ? ' have a relation': ' have no relation';
			?>
			<p><?php echo $user1['username']; ?> and <?php echo $jane['username'].' '.$has_relationship; ?></p>
			<?php
			$has_relationship= (PVUsers::checkUserRelationship($relationship['requesting_user'], $user_id_3)) ? ' have a relation': ' have no relation';
			?>
			<p><?php echo $user1['username']; ?> and <?php echo $shaniqua['username'].' '.$has_relationship; ?></p>
			<?php
			$has_relationship= (PVUsers::checkUserRelationship($relationship['requesting_user'], $user_id_4)) ? ' have a relation': ' have no relation';
			?>
			<p><?php echo $user1['username']; ?> and <?php echo $xing['username'].' '.$has_relationship; ?></p>
			<br />
			<br />
			<?php
		}//end foreach
		
		//Iterate through relationships and delete the relationship
		foreach($relationships as $relationship){
			PVUsers::deleteUserRelationship('$relationship_id');
		}
		
		//Iterate through users and delete the user
		foreach(PVUsers::getUserList() as $user){
			PVUsers::deleteUser($user['user_id']);
		}
		?>
		<p>Morey has been called for an intervention</p>
		<p>End user relationship demonstration</p>
	</body>
</html> 