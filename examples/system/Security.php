<?php
//Include the DEFINES and boot on the core componets.
//Do not initialize any of the other classes, that will be done manually
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

$role_args=array(
	'role_name'=>'Administrator',
	'role_description'=>'A user that has administrator privileges'
);

$role_id=PVUsers::addUserRole($role_args);

$user_args=array(
	'user_email'=>'roleexample@example.com',
	'user_access_level'=>2, //Set the user's access leve
	'user_role'=>'Administrator', //Assign the user to role created
);

$user_id=PVUsers::addUser($user_args);
$user_info=PVUsers::getUserInfo('roleexample@example.com');

//Check the user's access level

for($i=0; $i<5;$i++) {
	$access=(PVSecurity::checkUserAccessLevel($user_info['user_id'], $i)) ? 'Has the required access level with level '.$i : 'Does not have the required acccess level with access level '.$i;
	echo '<p>'.$access.'</p>';
}

$has_roles=(PVSecurity::checkUserRole($user_info['user_id'], 'Administrator')) ? 'User has correct role for access.' : 'User does not have the required role for access';
echo $has_roles.'<br />';

$has_roles=(PVSecurity::checkUserRole($user_info['user_id'], 'Super Administrator')) ? 'User has correct role for access.' : 'User does not have the required role for access';
echo $has_roles.'<br />';

$has_roles=(PVSecurity::checkUserRole($user_info['user_id'], array('Super Administrator','Administrator'))) ? 'User has correct role for access.' : 'User does not have the required role for access';
echo $has_roles.'<br />';

$has_roles=(PVSecurity::checkUserRole($user_info['user_id'], array('Registered','Not Registered'))) ? 'User has correct role for access.' : 'User does not have the required role for access';
echo $has_roles.'<br />';

PVUsers::deleteUser($user_info['user_id']);
PVUsers::deleteUserRole($role_id);

