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
					<?php include('../html/navigation.php'); ?>
				</nav>

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
					<h1>Database Examples</h1>

					<p>In this section of the site, we will go over examples of how to connect with various databases using ProdigyView and running queries. Currently, the toolkit supports Mysql, PostgreSQL, MS SQL, MongoDB and SQLite out of the box.</p>

					<h3>Basic SQL</h3>

					<p>In this first file, we are going to start with Mysql and review the basics of SQL by:</p>

					<ol>
						<li>Connecting To A database with Database::addConnection, Database::setDatabase.</li>
						<li>Create a database with  columns using Database::tableExist and Database::createTable</li>
						<li>Sanitizing input with Database::makeSafe</li>
						<li>And finally inserting and querying data with Database::query</li>
					</ol>

					<ul>
						<li>
							<a href="Database.php">Database.php</a>
						</li>
					</ul>

					<h3>Misc Functions</h3>

					<p>In this section, we are going to explore some miscellaneous SQL Function.
					
					<ul>
						<li>
							<a href="DBMisc.php">DBMisc.php</a>
						</li>
					</ul>

					<h3>Prepared Statements</h3>

					<p>In this part of the tutorial, we are going to explore how to use prepared statements with PostgreSQL for improved performance and integrity.</p>

					<ul>
						<li>
							<a href=">PreparedStatements.php">PreparedStatements.php</a>
						</li>
					</ul>

					<h3>Table And Column Manipulation</h3>

					<p>In this section, the code demonstration will be about how to manage the schema. This means created, deleting and modifying tables.</p>

					<ul>
						<li>
							<a href="TablesColumns.php">TablesColumns.php</a>
						</li>
					</ul>

					<h3>Mongo</h3>

					<p>In the last section, we will cover MongoDB! This will illustrate how to do basic CRUD operations against the database.</p>

					<ul>
						<li>
							<a href="Mongo.php">Mongo.php</a>
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
