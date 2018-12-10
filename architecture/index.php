<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/favicon.ico">

		<title>ProdigyView Example</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Custom styles for this template -->
		<link href="../html/dashboard.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">ProdigyView Toolkit Examples</a>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<nav class="col-md-2 d-none d-md-block bg-light sidebar">
					<?php
					include ('../html/navigation.php');
					?>
				</nav>

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
					<h1>Architecture and Design Patterns</h1>

					<p>
						Welcome to ProdigyView's architecture and Design Patterns section.
						This part of the tutorial will show you how to utilize various design pattern when building an application with the toolset.
						All design patterns are optional.
					</p>

					<h3>Adapters</h3>
					<p>
						Adapters are the ability to modify sections of application behavior without re-writing entire classes nor touching directly modifying the class. We cover explanations of the design pattern here:
					</p>

					<p>
						Example code includes:
					</p>

					<ul>
						<li>
							<a href="Adapter.php">Adapter.php</a>
						</li>
					</ul>

					<h3>Collections</h3>

					<p>
						Collections are the ability to create an object that can hold any type of data and then retrieve that data. To view collections, go here:
					</p>

					<ul>
						<li>
							<a href="Collections.php">Collections.php</a>
						</li>
					</ul>

					<h3>Command</h3>

					<p>
						The command is a way of creating an application with a command interpreter for executing functions. To view the command structure in action, you may view these examples:
					</p>

					<ul>
						<li>
							<a href="Command.php">Command.php</a>
						</li>
						<li>
							<a href="StaticCommand.php">StaticCommand.php</a>
						</li>
					</ul>
					
					<h3>Dynamic Object + Functional Programming</h3>

					<p>Dynamic objects is the ability to append functionality to an object that is not in the classes base functions. Given that the ability to extend an object is accomplished with anonymous functions, is creates the ability to potentially combine Object-Oriented Programming with Functional Programming.</p>
					<ul>
						<li>
							<a href="Objects.php">Objects.php</a>
					</li>
					</ul>
					
					<h3>Intercepting Filters</h3>
					<p>
						Intercepting Filters allow you to filter to modify the input and return values of a function. You may view this design pattern here:
					</p>
					<ul>
						<li>
							<a href="Filters.php">Filters.php</a>
					</li>
					</ul>
					
					<h3>Observers</h3>
					<p>
						Observers Design Pattern signals other objects that have subscribed to an action when an action has occurred. To view this design pattern, please go here:
					</p>
					<ul>
						<li>
							<a href="Observers.php">Observers.php</a>
						</li>
					</ul>

					<h3>Singletons</h3>
					<p>
						Singletons allow only one instance of a class to be created, and to use only that instance during the applications run time. To view singletons, please go here:
					</p>
					<ul>
						<li>
							<a href="Singleton.php">Singleton.php</a>
						</li>
					</ul>

				</main>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
