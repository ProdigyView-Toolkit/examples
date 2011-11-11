<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');
?>
<!DOCTYPE html> 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/android.css" media="only screen and (max-width: 480px)" />
		<link rel="stylesheet" type="text/css" href="css/desktop.css" media="screen and (min-width: 481px)" />            
		<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="explorer.css" media="all" />
		<![endif]-->
		<?php echo PVHtml::meta('viewport', array('content'=>'user-scalable=no, width=device-width'));?>
		<title>My Droid App</title>
		<script src="http://www.google.com/jsapi"></script>
		<script>
			google.load("jquery", "1.4.1");
		</script>
	</head>
	<body>
		<div id="container">
	 		<div id="header">
	    		<h1><a href="./">My Droid App</a></h1>
	    		<div id="utility">
	        	<ul>
	            	<li><a href="subpages/page1.html">Page 1</a></li>
	            	<li><a href="subpages/page2.html">Page 2</a></li>
	            	<li><a href="subpages/page3.html">Page 3</a></li>
	        	</ul>
	    		</div>
				<div id="nav">
					<ul>
						<li><a href="consulting-clinic.html">Consulting Clinic</a></li>
		            	<li><a href="on-call.html">On Call</a></li>
		            	<li><a href="development.html">Development</a></li>
		            	<li><a href="http://www.oreilly.com">O'Reilly Media, Inc.</a></li>
		        	</ul>
				</div>
				<div class="leftButton">Home</div>
			</div>
			<div id="content">
				<h2>About</h2>
		    	<p>Jonathan Stark is a web developer, speaker, and author. His 
		       		consulting firm, Jonathan Stark Consulting, Inc., has attracted
		       		clients such as Staples, Turner Broadcasting, and the PGA Tour.
		       		...
		       	</p>
		  	</div>
			<div id="sidebar">
		    	<img alt="Manga Portrait of Jonathan Stark" src="img/ic_menu_add.png"/>
		    	
		    	<p>Jonathan Stark is a mobile and web application developer who theWall Street Journal has called an expert on publishing desktop data to the web.</p>
		  	</div>
		  	<div id="footer">
		    	<ul>
		        	<li><a href="services.html">Services</a></li>
		        	<li><a href="about.html">About</a></li>
		        	<li><a href="blog.html">Blog</a></li>
		    	</ul>
		    	<p class="subtle">Jonathan Stark Consulting, Inc.</p>
		  	</div>
		</div>
	</body>
	<script type="text/javascript" src="js/android.js"></script>
</html>     