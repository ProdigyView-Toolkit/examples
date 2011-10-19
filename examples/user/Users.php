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
		//Add user to the database
		$user_id_1=PVUsers::addUser($args , $password_encoded=false);
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
		//Add user to the database
		$user_id_2=PVUsers::addUser($args , $password_encoded=false);
		?>
		
		<p>Created a user with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of user:<?php echo $user_id_2; ?></p>
		
		<?php $user_info=PVUsers::getUserInfo($user_id_1);?>
		<p>User Info retrieved by ID: <pre><?php print_r($user_info); ?></pre</p>
		
		<?php $user_info=PVUsers::getUserInfo('gadgetman@example.com'); ?>
		<p>User Info retrieved by Email: <pre><?php print_r($user_info); ?></pre></p>
		<br />
		<br />
		<?php
		
		//Attempt to login a user by their email or username and password combination.
		PVUsers::attemptLogin('gearman@example.com', 'abc123', $save_cookie=TRUE, $password_encoded=false);
		//Check if the user is logged in
		$logged_in=(PVUsers::checkLogin()) ? 'User is logged in' : 'User is not logged in.';
		echo '<p>'.$logged_in.'</p>';
		
		//Logout The user
		PVUsers::logout();
		
		//Force the user login without verifying the password
		PVUsers::loginUser('gearman@example.com');
		
		//Update a user by getting their information and then passing it back to the update function.
		//The required id is already in the field when using getUserInfo
		//Performing the update this way ensures no functions overwrittten. Blank fields will be
		//changed to their defaults when updated
		$user_info=PVUsers::getUserInfo('gadgetman@example.com');
		$user_info['image_url']='/images/me.jpg';
		PVUsers::updateUser($user_info);
		
		
		echo '<br />';
		echo '<br />';
		
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