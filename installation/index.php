<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

include('../DEFINES.php');

require_once(PV_CORE.'_classLoader.php');
PVDatabase::init();



?>
<html>
<head>
<title>ProdigyView Installer</title>
</head>
<body>
<?php

if(isset($_POST['install'])){

	$status=$_POST['status'];
	PVDatabase::setDatabase();
	$database_type=PVDatabase::getDatabaseType();
	include('script.php');
	$sql_array="";
	
	if($database_type=="mysql"){
		$sql_array=$mysql_installation_array;
	}
	else if($database_type=="postgresql"){
		$sql_array=$postgresql_installation_array;
	}
	else if($database_type=="mssql"){
		$sql_array=$mssql_installation_array;
	}
	
	$total_tables=count($sql_array);
	$total_tables_installed=0;
	
	if(is_array($sql_array)){
		echo '<p>Beginning Installation</p>';
		if($status=='on'){
			?>
            <table width="100%">
            <thead>
            	<tr>
                <th>Table Name</th>
                <th>Succesfully Installed</th>
                </tr>
           </thead>
            <tbody>
            <?php	
		}
		
		foreach($sql_array as $key=>$value){
			PVDatabase::query($value);
			
			if(PVDatabase::tableExist($key)==1){
				$installation_status='Installed';
				$total_tables_installed++;
			}
			else{
				$installation_status='Not Installed';	
			}
			if($status=='on'){
				?>
                <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $installation_status; ?></td>
                </tr>
                <?php	
			}
		}
		
		if($status=='on'){
			?>
          </tbody>
          </table>
            
            <?php	
		}
		echo '<p>Installed '.$total_tables_installed.'/'.$total_tables.'</p>';
		echo "<p>Installation Complete</p>";
	}

}
?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<h1>ProdigyView Installer</h1>

<p>Welcome to the ProdigyView installer. Please make sure the following is in place before running the installer.</p>
<ol>
<li>Make sure the host option 'config_db_hostname' is set correctly in the config.php</li>
<li>Make sure the database user option 'config_db_user' is set correctly in the config.php</li>
<li>Make sure the database user's password option 'config_db_pass' is set correctly in the config.php</li>
<li>Make sure the database type option 'config_db_type' is set correctly in the config.php. This value should be set to one of these option</li>
	<ul>
    <li>mysql</li>
    <li>postgresql</li>
    <li>mssql</li>
    </ul>
<li>Make sure the database name option 'config_db_name' is set correctly in the config.php</li>
<li>If required, make sure the database schema option 'config_db_schema' is set correctly in the config.php</li>
<li>If required, make sure the database port option 'config_db_port' is set correctly in the config.php</li>
<li>If required, make sure the database table prefix option 'config_db_prefix' is set correctly in the config.php. The prefix will be added to the beginning of all tables.</li>
<li>Run the installer.</li>
</ol>

<p><input type="checkbox" name="status" checked="checked" />Installation Status - Check to allow status updates of the installation.</p>
<input type="submit" name="install" value="Install ProdigyView" />
</form>
</body>
</html>