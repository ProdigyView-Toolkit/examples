<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>User Roles Example</title>
	</head>
	<body>
		<?php
		//Create A Point that relates to a user and content
		$args=array(
			'role_name'=>'Administrator',
			'role_description'=>'Administer the site',
			'role_type'=>'admin',
		);
		
		$role_id_1=PVUsers::addUserRole($args);
		?>
		
		<p>Created a user role with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of point: <?php echo $role_id_1; ?></p>
		
		<?php
		//Create a point that relates to an comment and an app
		$args=array(
			'role_name'=>'Registered User',
			'role_description'=>'A registered user',
			'role_type'=>'user',
		);
		$role_id_2=PVUsers::addUserRole($args);
		?>
		
		<p>Created a user role with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of point:<?php echo $role_id_2; ?></p>
		
		<?php //Retrieve data on a role by the id of the role ?>
		<?php $role_info=PVUsers::getUserRoleByID($role_id_1);?>
		<p>User Role info retrieved by ID: <pre><?php print_r($role_info); ?></pre></p>
		
		<?php //Retrieve data on a role by the name of the role ?>
		<?php $role_info=PVUsers::getUserRoleByName('Registered User'); ?>
		<p>User Role info retrieved by role name: <pre><?php print_r($role_info); ?></pre></p>
		<?php
		
		//Add a role to a user
		PVUsers::addUserToRole('10', 'Registered User');
		
		//Remove User From Role
		PVUsers::removeUserFromeRole('10', 'Registered User');
		
		//Update Role
		$role_info['role_name']='Super Admin';
		PVUsers::updateUserRole($role_info);
		
		//Search for roles based upon parameters passed
		$roles_list=PVUsers::getUserRolesList(array('role_type'=>'admin,user'));
		
		//Iterate Through roles and delete them
		foreach($roles_list as $role){
			?>
			<p>Deleting subscription <?php echo $role['role_name']; ?> with a value of <?php echo $role['role_type']; ?></p>
			<?php
			PVUsers::deleteUserRole($role['role_id']);
		}//end for
		?>
		
		<p>End user role demonstration</p>
	</body>
</html> 