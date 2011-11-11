<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE html> 
<html>  
	<head>
		<title>Golf score keeper</title>
		<script src="http://www.google.com/jsapi"></script>
		<script>
			google.load("jquery", "1.4.1");
		</script>
	</head>
	<body>
		<?php echo PVForms::formBegin('upload-form', array('action'=>'upload.php', 'method'=>'get')); ?>
			<div>
				<?php echo PVForms::label('Hole 1', array('for'=>'hole_1')); ?>
				<?php echo PVForms::number('hole_1', array( 'min'=>1, 'value'=>4, 'size'=>2, 'step'=>1)); ?>
			</div>
      		<div>
        		<?php echo PVForms::label('Hole 2', array('for'=>'hole_2')); ?>
				<?php echo PVForms::number('hole_2', array( 'min'=>1, 'value'=>4, 'size'=>2, 'step'=>1)); ?>
      		</div>
      		<div>
        		<?php echo PVForms::email('email',array('placeholder'=>'Enter your email address', 'size'=>40)); ?>
      		</div>
      		<div>
				<?php echo PVForms::text('latitude', array('id'=>'lat_field')); ?>
				<?php echo PVForms::text('longitude', array('id'=>'long_field')); ?>
			</div>
	      	<script>
		        navigator.geolocation.getCurrentPosition(
		          function(pos) {
		            $("#lat_field").val(pos.coords.latitude);
		            $("#long_field").val(pos.coords.longitude);
		          }
		        );
	     	 </script>
			<div>
				<?php echo PVForms::submit('submit_score', array('value'=>'Upload Score')); ?>
			</div>
		<?php echo PVForms::formEnd(); ?>
	</body>
</html> 