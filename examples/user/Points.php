<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Points Example</title>
	</head>
	<body>
		<?php
		//Create A Point that relates to a user and content
		$args=array(
			'point_type'=>'nabisco_points',
			'user_id'=>3,
			'content_id'=>200,
			'point_value'=>2.5
		);
		
		$point_id_1=PVPoints::addPoint($args);
		?>
		
		<p>Created a point with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of point: <?php echo $point_id_1; ?></p>
		
		<?php
		//Create a point that relates to an comment and an app
		$args=array(
			'point_type'=>'nabisco_points',
			'comment_id'=>14,
			'app_id'=>309,
			'point_value'=>10
		);
		$point_id_2=PVPoints::addPoint($args);
		?>
		
		<p>Created a point with the following parameters:<pre><?php print_r($args); ?></pre></p>
		<p>ID of point:<?php echo $point_id_2; ?></p>
		
		<?php $point_info=PVPoints::getPoint($point_id_1);?>
		<p>Point info retrieved by ID: <pre><?php print_r($point_info); ?></pre</p>
		
		<?php $point_info=PVPoints::getPoint($point_id_2); ?>
		<p>Point info retrieved by ID: <pre><?php print_r($point_info); ?></pre></p>
		<?php
		
		//Update Point
		$point_info['point_value']='3';
		PVPoints::updatePoint($point_info);
		
		$point_list=PVPoints::getPointsList(array('point_type'=>'nabisco_points'));
		
		foreach($point_list as $point){
			?>
			<p>Deleting point <?php echo $point['point_type']; ?> with a value of <?php echo $point['point_value']; ?></p>
			<?php
			PVPoints::deletePoint($point['point_id']);
		}//end for
		?>
		
		<p>End points demonstration</p>
	</body>
</html> 