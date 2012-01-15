ProdigyView Sample System README (it's really short)
Core Version 1.5.3

Sections
	Git
	Installation
	MongoDB
	Examples & Requirements
	Tutorials
	Problems

Before you start
	This is only a sample system designed to give an idea of how the framework functions. You may modify the structure as you please but please leave the core intact as is.


Git

	If the code was pulled using git, remember to do:
	git submodule init
	git sumbodule update --recursive
	
	If the code was downloaded as a zip with git, the core will be empty. Download the core to use.


Installation

	Everything in ProdigyView DOES NOT require a database. But, certain sections of the framework do require a connection to a database.
	Below will be the instructions for installing the framework.
	
	1). Set up a database(Mysql, Postgresql, SQL Server, MongoDB). You will need the following information:
		A. Host
		B. Database User
		C. Database Password
		D. Database Name
		E.Port(Optional)
		F. Schema(Optional)
	
	2)Upload the the files to a directory on a server.
	
	3)Enter the information about the database based into the configuration. The file is located at config/config.php.
	
	4). In a browser, navigate to where the files were upload and run the installation/index.php file.
	
	5). Database installation is complete. You may now start using ProdigyView.

MongoDB

	If you are using MongoDB, not all the examples have been configured to work with this database. Review the following:
	
	Will Work
		Helium MVC
		MongoDB Examples
		Everything that does not require the built in CMS or a database connection
		
	Will Not Work
		Plugins
		Applications
		User Examples
		Normal Database Examples
		CMS
		
	These features will be updated in the near future to work with MongoDB and other NoSQL solutions
	
Examples & Requirements
	The examples presented in this sample system IS RUNNABLE code. Navigate to them in your browser to test them. Some examples WILL REQUIRE
	a database connection. Other tutorials will require certan extensions to be installed.
	
	FFMPEG
		Audio Examples
		Video Examples
	Imagick
		Image Examples
	PEAR Mail
		SMTP Examples
	
Tutorials
	The examples are accompanied with tutorials that will teach you how to use ProdigyView. You may read them at:
	http://www.prodigyview.com/tutorials
	
Problems
	If you run into problems, email contact@prodigyview.com 
