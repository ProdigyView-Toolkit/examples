<!DOCTYPE html> 
<html>  
	<head>
		<title>Helium Blog</title>
		<script src="http://www.google.com/jsapi"></script>
		<link rel="stylesheet" href="<?php echo PV_CSS; ?>main.css" type="text/css" media="screen" />
		<script>
			google.load("jquery", "1.4.1");
		</script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>
					Helium Example Blog
				</h1>
			</div>
			<div id="navigation">
				<ul>
					<li><?php echo PVHtml::alink('Home', array('controller' =>'')); ?></li>
					<li><?php echo PVHtml::alink('Post', array('controller' =>'post')); ?></li>
					
				</ul>
			</div>
			<div id="content-container">
				<div id="section-navigation">
					<ul>
						<?php echo PVHtml::alink('Add User', array('controller' =>'users', 'action' => 'add')); ?><br />
						<?php echo PVHtml::alink('Add Post', array('controller' =>'post', 'action' => 'add')); ?><br />
					</ul>
				</div>
				<div id="content">
					<?php echo $this->ShowAlert->showAlert(); ?>
					<?php echo $this->content(); ?>
				</div>
				<div id="aside">
					<?php echo PVHtml::alink('ProdigyView', 'http://www.prodigyview.com'); ?><br />
				</div>
				<div id="footer">
					Copyright © Site name, 20XX
				</div>
			</div>
		</div>
	</body>
</html>