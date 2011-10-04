<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>User Example</title>
	</head>
	<body>
		<?php
		//Create A user
		$args=array(
			'username'=>'Gear Man',
			'user_email'=>'gearman@example.com',
			'user_password'=>'abc123',
			'user_access_level'=>1,
			'is_active'=>1
		);
		
		$user_id_1=PVUsers::addUser($args);
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_1; ?></p>
		
		<?php
		
		//Create A user
		$args=array(
			'username'=>'Gadget Man',
			'user_email'=>'gadgetman@example.com',
			'user_password'=>'dooraeme',
			'user_access_level'=>2,
			'is_active'=>0
		);
		$user_id_2=PVUsers::addUser($args);
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_2; ?></p>
		
		<?php $user_info=PVUsers::getUserInfo($user_id_1);?>
		<p>User Info retrieved by ID: <pre><?php print_r($user_info); ?></pre</p>
		
		<?php $user_info=PVUsers::getUserInfo('gadgetman@example.com'); ?>
		<p>User Info retrieved by Email: <pre><?php print_r($user_info); ?></pre></p>
		<?php
		
		$user_list=PVUsers::getUserList(array('content_access_level'=>'1,2'));
		print_r($user_list);
		foreach($user_list as $user){
			?>
			<p>Deleting user <?php echo $user['username']; ?></p>
			<?php
			PVUsers::deleteUser($user['user_id']);
		}//end for
		?>
		
		<p>End user demonstration</p>
	</body>
</html> 