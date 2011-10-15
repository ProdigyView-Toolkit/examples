<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Prepared SQL Statements Example</title>
	</head>
	<body>
		<?php
		$table=PVDatabase::getSessionTrackerTableName();
	
		$data=array(
			'user_ip'=>$_SERVER['REMOTE_ADDR'],
			'user_id'=>3,
			'browser_name'=>'Firefox'
		);
		?>
		<h1>Prepared Insert</h1>
		<p>Creating a prepared statement.</p>
		<?php
		$id=PVDatabase::preparedReturnLastInsert($table, 'record_id', $table,  $data);
		?>
		<p>Result of prepared statement <?php echo $id; ?></p>
		<h2>Prepared Select</h2>
		<?php
		$query='SELECT * FROM '.$table.' WHERE user_id='.PVDatabase::getPreparedPlaceHolder(1);
		$data=array('user_id'=>3);
		$result=PVDatabase::preparedSelect($query, $data);
		?>
		<p>Row Count: <?php echo PVDatabase::resultRowCount($result); ?></p>
		<p>Return a row</p>
		<?php
		$row=PVDatabase::fetchArray($result);
		?>
		<pre><?php print_r($row); ?></pre>
		?>
		<h2>Update the Row</h2>
		<?php
			$data=array(
				'referred_page'=>'http://www.prodigyview.com',
				'browser_language'=>'eng'
			);
			$wherelist=array(
				'record_id'=>$row['record_id']
			);
		?>
		<pre><?php echo print_r($data); ?></pre>
		<pre><?php echo print_r($wherelist); ?></pre>
		<?php PVDatabase::preparedUpdate($table, $data, $wherelist); ?>
		<p>Row has be succesffuly update</p>
		<h2>Delete Row</h2>
		<?php
		PVDatabase::preparedDelete($table, $wherelist);
		?>
		<p>Row has been succesfully deleted.</p>
	</body>
</html> 