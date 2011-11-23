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
				<?php echo PVHtml::strong('It\'s lighter than Lithium'); ?>
			</div>
			<div id="navigation">
				<ul>
					<li><?php echo PVHtml::alink('Home', array('controller' =>'')); ?></li>
					<li><?php echo PVHtml::alink('Post', array('controller' =>'post')); ?></li>
					<?php if($this->UserHelper->isLoggedIn()): ?>
						<li><?php echo PVHtml::alink('Logout', array('controller'=>'users', 'action'=>'logout'));?></li>
						<li>Welcome <?php echo $this->UserHelper->username(); ?></li>
					<?php else: ?>
						<li><?php echo PVHtml::alink('Login', array('controller'=>'users', 'action'=>'login'));?></li>
						<li><?php echo PVHtml::alink('Register', array('controller'=>'users', 'action'=>'register'));?></li>
					<?php endif; ?>
					
				</ul>
			</div>
			<div id="content-container">
				<div id="section-navigation">
					<ul>
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
					<?php echo PVHtml::alink('RSS Feed', '/rss');?>
					- Copyright © Site name, 20XX
				</div>
			</div>
		</div>
	</body>
</html>