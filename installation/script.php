<?php 
/*
$mysql_installation_array['']="";

$postgresql_installation_array['']="";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array['']="";
*/

$mysql_installation_array=array();

$postgresql_installation_array=array();

$sqlite_installation_array=array();

$firebird_installation_array=array();

$mssql_installation_array=array();


/*-------------------------------------------------------------------------------------------------------*/
/*PV Options*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getOptionsTableName()]="CREATE TABLE  ".PVDatabase::getOptionsTableName()." (			
				option_id INT NOT NULL AUTO_INCREMENT,
				app_id INT NOT NULL DEFAULT  '0',
				user_id INT NOT NULL DEFAULT  '0',
				content_id INT NOT NULL DEFAULT  '0',
				option_name VARCHAR( 255 ) NOT NULL DEFAULT '',
				option_value LONGTEXT NOT NULL DEFAULT '',
				option_type VARCHAR( 255 ) NOT NULL DEFAULT '',
				option_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
				PRIMARY KEY(option_id)
				);";

$postgresql_installation_array[PVDatabase::getOptionsTableName()]="CREATE TABLE  ".PVDatabase::getOptionsTableName()." (
				option_id serial NOT NULL,
				app_id integer NOT NULL DEFAULT  '0',
				user_id integer NOT NULL DEFAULT  '0',
				content_id integer NOT NULL DEFAULT  '0',
				option_name character varying( 255 ) NOT NULL DEFAULT '',
				option_value text NOT NULL DEFAULT '',
				option_type character varying( 255 ) NOT NULL DEFAULT '',
				option_date TIMESTAMP NOT NULL DEFAULT now() ,
				PRIMARY KEY(option_id)
				);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getOptionsTableName()]="CREATE TABLE  ".PVDatabase::getOptionsTableName()." (
				option_id int IDENTITY (1,1) NOT NULL,
				app_id int DEFAULT 0 NOT NULL,
				user_id int DEFAULT 0 NOT NULL,
				content_id int DEFAULT 0 NOT NULL,
				option_name varchar(255) DEFAULT '' NOT NULL,
				option_value varchar(max) DEFAULT '' NOT NULL,
				option_type varchar(255) DEFAULT '' NOT NULL,
				option_date datetime DEFAULT 'CURRENT_TIMESTAMP' NOT NULL,
				PRIMARY KEY (option_id));";

/*-------------------------------------------------------------------------------------------------------*/
/*PV Content Taxonomy*/
/*-------------------------------------------------------------------------------------------------------*/
$mysql_installation_array[PVDatabase::getContentTaxonomyTableName()]="CREATE TABLE  ".PVDatabase::getContentTaxonomyTableName()." (
			content_id INT NOT NULL,
		    taxonomy_term VARCHAR(255) NOT NULL DEFAULT '',
		    taxonomy_term_parent VARCHAR(255) NOT NULL DEFAULT '',
		    PRIMARY KEY(content_id, taxonomy_term )
		);";

$postgresql_installation_array[PVDatabase::getContentTaxonomyTableName()]="CREATE TABLE   ".PVDatabase::getContentTaxonomyTableName()." (
				content_id integer NOT NULL,
			    taxonomy_term character varying(255) NOT NULL DEFAULT '',
			    taxonomy_term_parent character varying(255) NOT NULL DEFAULT '',
			    PRIMARY KEY(content_id, taxonomy_term, taxonomy_term_parent )
			);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentTaxonomyTableName()]="CREATE TABLE  ".PVDatabase::getContentTaxonomyTableName()." (
			content_id int DEFAULT 0 NOT NULL,
			taxonomy_term varchar(255) DEFAULT '' NOT NULL,
			taxonomy_term_parent varchar(255) DEFAULT '' NOT NULL,
			PRIMARY KEY (content_id, taxonomy_term, taxonomy_term_parent))";


/*-------------------------------------------------------------------------------------------------------*/
/*PV User Taxonomy*/
/*-------------------------------------------------------------------------------------------------------*/
$mysql_installation_array[PVDatabase::getUserTaxonomyTableName()]="CREATE TABLE  ".PVDatabase::getUserTaxonomyTableName()." (
			user_id INT NOT NULL,
		    taxonomy_term VARCHAR(255) NOT NULL DEFAULT '',
		    taxonomy_term_parent VARCHAR(255) NOT NULL DEFAULT '',
		    PRIMARY KEY(user_id, taxonomy_term )
		);";

$postgresql_installation_array[PVDatabase::getUserTaxonomyTableName()]="CREATE TABLE  ".PVDatabase::getUserTaxonomyTableName()." (
				user_id integer NOT NULL,
			    taxonomy_term character varying(255) NOT NULL DEFAULT '',
			    taxonomy_term_parent character varying(255) NOT NULL DEFAULT '',
			    PRIMARY KEY(user_id, taxonomy_term, taxonomy_term_parent )
			);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getUserTaxonomyTableName()]="CREATE TABLE ".PVDatabase::getUserTaxonomyTableName()." (
			user_id int DEFAULT 0 NOT NULL,
			taxonomy_term varchar(255) DEFAULT '' NOT NULL,
			taxonomy_term_parent varchar(255) DEFAULT '' NOT NULL,
			PRIMARY KEY (user_id, taxonomy_term, taxonomy_term_parent))";

/*-------------------------------------------------------------------------------------------------------*/
/*Application Manager*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getApplicationsTableName()]="CREATE TABLE ".PVDatabase::getApplicationsTableName()." (
    app_id INT NOT NULL auto_increment,
    app_name VARCHAR(255) NOT NULL DEFAULT '',
    app_file VARCHAR(255) NOT NULL DEFAULT '',
    app_directory VARCHAR(255) NOT NULL DEFAULT '',
    app_unique_id VARCHAR(255) NOT NULL DEFAULT '',
    app_parameters text NOT NULL DEFAULT '',
    enabled TINYINT NOT NULL DEFAULT 0,
    app_object VARCHAR(255) NOT NULL DEFAULT '',
    jquery_libraries text NOT NULL DEFAULT '',
    javascript_libraries text NOT NULL DEFAULT '',
    show_admin TINYINT NOT NULL DEFAULT 1,
    admin_dir VARCHAR(255) NOT NULL DEFAULT '',
    admin_file VARCHAR(255) NOT NULL DEFAULT '',
    admin_object VARCHAR(255) NOT NULL DEFAULT '',
    backend_app TINYINT NOT NULL DEFAULT 0,
    admin_jquery_libraries text NOT NULL DEFAULT '',
    admin_javascript_libraries text NOT NULL DEFAULT '',
    admin_motools_libraries text NOT NULL DEFAULT '',
    prototype_libraries text NOT NULL DEFAULT '',
    admin_prototype_libraries text NOT NULL DEFAULT '',
    app_default_page VARCHAR(255) NOT NULL  DEFAULT '',
    app_version DOUBLE NOT NULL DEFAULT 0,
    app_description text NOT NULL DEFAULT '',
    motools_libraries text NOT NULL DEFAULT '',
    css_files text NOT NULL DEFAULT '',
    admin_css_files text NOT NULL DEFAULT '',
    uninstall_file VARCHAR(255) NOT NULL DEFAULT '',
    has_module TINYINT NOT NULL DEFAULT 1,
    show_main_section TINYINT NOT NULL DEFAULT 0,
    app_icon VARCHAR(255) NOT NULL DEFAULT '',
    app_preferences text NOT NULL DEFAULT '',
    is_application_editable TINYINT NOT NULL DEFAULT 0,
    app_license text NOT NULL DEFAULT '',
	application_type VARCHAR(50) NOT NULL DEFAULT '',
	application_language VARCHAR(20) NOT NULL DEFAULT '',
	app_site VARCHAR(255) NOT NULL DEFAULT '',
	app_author VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (app_id)
);";

$postgresql_installation_array[PVDatabase::getApplicationsTableName()]="CREATE TABLE ".PVDatabase::getApplicationsTableName()." (
    app_id serial NOT NULL,
    app_name character varying(255) NOT NULL DEFAULT ''::character varying,
    app_file character varying(255) NOT NULL DEFAULT ''::character varying,
    app_directory character varying(255) NOT NULL DEFAULT ''::character varying,
    app_unique_id character varying(255) NOT NULL DEFAULT ''::character varying,
    app_parameters text NOT NULL DEFAULT ''::text,
    enabled smallint NOT NULL DEFAULT 0,
    app_object character varying(255) NOT NULL DEFAULT ''::character varying,
    jquery_libraries text NOT NULL DEFAULT ''::text,
    javascript_libraries text NOT NULL DEFAULT ''::text,
    show_admin smallint NOT NULL DEFAULT 1,
    admin_dir character varying(255) NOT NULL DEFAULT ''::character varying,
    admin_file character varying(255) NOT NULL DEFAULT ''::character varying,
    admin_object character varying(255) NOT NULL DEFAULT ''::character varying,
    backend_app smallint NOT NULL DEFAULT 0,
    admin_jquery_libraries text NOT NULL DEFAULT ''::text,
    admin_javascript_libraries text NOT NULL DEFAULT ''::text,
    admin_motools_libraries text NOT NULL DEFAULT ''::text,
    prototype_libraries text NOT NULL DEFAULT ''::text,
    admin_prototype_libraries text NOT NULL DEFAULT ''::text,
    app_default_page character varying(255) NOT NULL DEFAULT ''::character varying,
    app_version double precision NOT NULL DEFAULT 0,
    app_description text NOT NULL DEFAULT ''::text,
    motools_libraries text NOT NULL DEFAULT ''::text,
    css_files text NOT NULL DEFAULT ''::text,
    admin_css_files text NOT NULL DEFAULT ''::text,
    uninstall_file character varying(255) NOT NULL DEFAULT ''::character varying,
    has_module smallint NOT NULL DEFAULT 1,
    show_main_section smallint NOT NULL DEFAULT 0,
    app_icon character varying(255) NOT NULL DEFAULT ''::character varying,
    app_preferences text NOT NULL DEFAULT ''::text,
    is_application_editable smallint NOT NULL DEFAULT 0,
    app_license text NOT NULL DEFAULT ''::text,
	application_type character varying(50) NOT NULL DEFAULT ''::character varying,
	application_language character varying(20) NOT NULL DEFAULT ''::character varying,
	app_site character varying(255) NOT NULL DEFAULT ''::character varying,
	app_author character varying(255) NOT NULL DEFAULT ''::character varying,
    PRIMARY KEY (app_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getApplicationsTableName()]="CREATE TABLE ".PVDatabase::getApplicationsTableName()." (
	app_id int IDENTITY (1,1) NOT NULL,
	app_name varchar(255) DEFAULT '' NOT NULL,
	app_file VARCHAR(255) DEFAULT '' NOT NULL,
	app_directory varchar(255) DEFAULT '' NOT NULL,
	app_unique_id varchar(255) DEFAULT '' NOT NULL,
	app_parameters varchar(max) DEFAULT '' NOT NULL,
	enabled tinyint DEFAULT 0 NOT NULL,
	app_object varchar(255) DEFAULT '' NOT NULL,
	jquery_libraries varchar(max) DEFAULT '' NOT NULL,
	javascript_libraries varchar(max) DEFAULT '' NOT NULL,
	show_admin tinyint DEFAULT 0 NOT NULL,
	admin_dir varchar(255) DEFAULT '' NOT NULL,
	admin_file varchar(255) DEFAULT '' NOT NULL,
	admin_object varchar(255) DEFAULT '' NOT NULL,
	backend_app tinyint DEFAULT 0 NOT NULL,
	admin_jquery_libraries varchar(max) DEFAULT '' NOT NULL,
	admin_javascript_libraries varchar(max) DEFAULT '' NOT NULL,
	admin_motools_libraries varchar(max) DEFAULT '' NOT NULL,
	prototype_libraries varchar(max) DEFAULT '' NOT NULL,
	admin_prototype_libraries varchar(max) DEFAULT '' NOT NULL,
	app_default_page varchar(255) DEFAULT '' NOT NULL,
	app_version float DEFAULT 0 NOT NULL,
	app_description varchar(max) DEFAULT '' NOT NULL,
	motools_libraries varchar(max) DEFAULT '' NOT NULL,
	css_files text DEFAULT '' NOT NULL,
	admin_css_files varchar(max) DEFAULT '' NOT NULL,
	uninstall_file varchar(255) DEFAULT '' NOT NULL,
	has_module tinyint DEFAULT 0 NOT NULL,
	show_main_section tinyint DEFAULT 0 NOT NULL,
	app_icon varchar(255) DEFAULT '' NOT NULL,
	app_preferences varchar(max) DEFAULT '' NOT NULL,
	is_application_editable tinyint DEFAULT 0 NOT NULL,
	app_license varchar(max) DEFAULT '' NOT NULL,
	application_type VARCHAR(50) NOT NULL DEFAULT '',
	application_language VARCHAR(20) NOT NULL DEFAULT '',
	app_site VARCHAR(255) NOT NULL DEFAULT '',
	app_author VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (app_id))";

/*-------------------------------------------------------------------------------------------------------*/
/*Container Manager Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/


$mysql_installation_array[PVDatabase::getContainersTableName()]="CREATE TABLE ".PVDatabase::getContainersTableName()." (
    container_id INT NOT NULL auto_increment,
    container_name VARCHAR(255) NOT NULL DEFAULT '',
    container_description text NOT NULL DEFAULT '',
    container_alias VARCHAR(255) NOT NULL DEFAULT '',
    container_position VARCHAR(255) NOT NULL DEFAULT '',
    container_header VARCHAR(255) NOT NULL DEFAULT '',
    show_header tinyint NOT NULL DEFAULT 0,
    container_enabled tinyint NOT NULL DEFAULT 0,
    container_params text NOT NULL DEFAULT '',
    container_css_params text NOT NULL DEFAULT '',
    container_wrap tinyint NOT NULL DEFAULT 0,
    container_permissions text NOT NULL DEFAULT '',
    container_parent INT NOT NULL DEFAULT 0,
    container_site_id INT NOT NULL DEFAULT 0,
    PRIMARY KEY (container_id)
);";

$postgresql_installation_array[PVDatabase::getContainersTableName()]="CREATE TABLE ".PVDatabase::getContainersTableName()." (
    container_id serial NOT NULL,
    container_name character varying(255) NOT NULL DEFAULT '',
    container_description text NOT NULL DEFAULT '',
    container_alias character varying(255) NOT NULL DEFAULT '',
    container_position character varying(255) NOT NULL DEFAULT '',
    container_header character varying(255) NOT NULL DEFAULT '',
    show_header smallint NOT NULL DEFAULT 0,
    container_enabled smallint NOT NULL DEFAULT 0,
    container_params text NOT NULL DEFAULT '',
    container_css_params text NOT NULL DEFAULT '',
    container_wrap smallint NOT NULL DEFAULT 0,
    container_permissions text DEFAULT ''::text,
    container_parent integer NOT NULL DEFAULT 0,
    container_site_id integer NULL DEFAULT 0,
    PRIMARY KEY (container_id)
);";

$sqlite_installation_array[PVDatabase::getContainersTableName()]="CREATE TABLE ".PVDatabase::getContainersTableName()." (
    container_id INTEGER NOT NULL auto_increment,
    container_name VARCHAR(255),
    container_description text,
    container_alias VARCHAR(255),
    container_position VARCHAR(255),
    container_header VARCHAR(255),
    show_header BOOLEAN DEFAULT 0,
    container_enabled BOOLEAN DEFAULT 0,
    container_params text,
    container_css_params text,
    container_wrap BOOLEAN DEFAULT 0,
    container_permissions text DEFAULT '',
    PRIMARY KEY (container_id)
);";

$firebird_installation_array[PVDatabase::getContainersTableName()]="";

$mssql_installation_array[PVDatabase::getContainersTableName()]="CREATE TABLE ".PVDatabase::getContainersTableName()." (
	container_id int IDENTITY (1,1) NOT NULL,
	container_name varchar(25) DEFAULT '' NOT NULL,
	container_description varchar(max) DEFAULT '' NOT NULL,
	container_alias varchar(255) DEFAULT '' NOT NULL,
	container_position varchar(255) DEFAULT '' NOT NULL,
	container_header varchar(255) DEFAULT '' NOT NULL,
	show_header tinyint DEFAULT 0 NOT NULL,
	container_enabled tinyint DEFAULT 0 NOT NULL,
	container_params varchar(max) DEFAULT '' NOT NULL,
	container_css_params varchar(max) DEFAULT '' NOT NULL,
	container_wrap tinyint DEFAULT 0 NOT NULL,
	container_permissions varchar(max) DEFAULT '' NOT NULL,
	container_parent int DEFAULT 0 NOT NULL,
	container_site_id int DEFAULT 0 NOT NULL,
	PRIMARY KEY (container_id)
	);";


/*Container Module Installation Script*/

$mysql_installation_array[PVDatabase::getContainerModulesTableName()]="CREATE TABLE ".PVDatabase::getContainerModulesTableName()." (
    container_id INT NOT NULL DEFAULT 0,
    module_id INT NOT NULL DEFAULT 0,
    container_module_ordering INT NOT NULL DEFAULT 0,
    container_module_enabled tinyint NOT NULL DEFAULT 0,
    container_module_id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY( container_module_id)
);";

$postgresql_installation_array[PVDatabase::getContainerModulesTableName()]="CREATE TABLE ".PVDatabase::getContainerModulesTableName()." (
    container_id integer NOT NULL DEFAULT 0,
    module_id integer NOT NULL DEFAULT 0,
    container_module_ordering integer NOT NULL DEFAULT 0,
    container_module_enabled smallint NOT NULL DEFAULT 0,
    container_module_id serial NOT NULL,
    PRIMARY KEY(container_id, module_id, container_module_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContainerModulesTableName()]="CREATE TABLE ".PVDatabase::getContainerModulesTableName()." (
    container_id INT NOT NULL DEFAULT 0,
    module_id INT NOT NULL DEFAULT 0,
    container_module_ordering INT NOT NULL DEFAULT 0,
    container_module_enabled tinyint NOT NULL DEFAULT 0,
    container_module_id INT IDENTITY (1,1) NOT NULL,
    PRIMARY KEY( container_module_id)
);";


/**-----------------------------------------------------------------------------------------------
 * Page Module Relationship
 *----------------------------------------------------------------------------------------------*/


$mysql_installation_array[PVDatabase::getPageModuleRelationshipTableName()]="CREATE TABLE ".PVDatabase::getPageModuleRelationshipTableName()." (
		page_id INT NOT NULL DEFAULT '0',
		module_id INT NOT NULL DEFAULT '0',
		page_module_ordering INT NOT NULL DEFAULT '0',
		page_module_enabled TINYINT NOT NULL DEFAULT '0',
		page_module_id INT NOT NULL auto_increment,
		PRIMARY KEY ( page_module_id )
		);";

$postgresql_installation_array[PVDatabase::getPageModuleRelationshipTableName()]="CREATE TABLE ".PVDatabase::getPageModuleRelationshipTableName()." (
		page_id integer NOT NULL DEFAULT '0',
		module_id integer NOT NULL DEFAULT '0',
		page_module_ordering integer NOT NULL DEFAULT '0',
		page_module_enabled smallint NOT NULL DEFAULT '0',
		page_module_id SERIAL NOT NULL,
		PRIMARY KEY ( page_id , module_id , page_module_id )
		);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getPageModuleRelationshipTableName()]="CREATE TABLE ".PVDatabase::getPageModuleRelationshipTableName()." (
page_id int DEFAULT 0 NOT NULL,
module_id int DEFAULT 0 NOT NULL,
page_module_ordering int DEFAULT 0 NOT NULL,
page_module_enabled tinyint DEFAULT 0 NOT NULL,
page_module_id int IDENTITY (1,1) NOT NULL,
PRIMARY KEY (page_module_id))";


/**-----------------------------------------------------------------------------------------------
 * Content Comment
 *----------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getContentCommentsTableName()]="CREATE TABLE  ".PVDatabase::getContentCommentsTableName()." (
	comment_id INT NOT NULL AUTO_INCREMENT,
	content_id INT NOT NULL DEFAULT  '0',
	owner_id INT NOT NULL DEFAULT  '0',
	owner_ip VARCHAR( 100 ) NOT NULL DEFAULT  '',
	comment_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	comment_approved TINYINT NOT NULL DEFAULT  '1',
	comment_title VARCHAR( 255 ) NOT NULL DEFAULT  '',
	comment_text TEXT NOT NULL DEFAULT  '',
	comment_parent INT NOT NULL DEFAULT  '0',
	comment_author VARCHAR( 255 ) NOT NULL DEFAULT  '',
	comment_author_email VARCHAR( 255 ) NOT NULL DEFAULT  '',
	comment_author_website VARCHAR( 255 ) NOT NULL DEFAULT  '',
	comment_type VARCHAR( 255 ) NOT NULL DEFAULT  '',
	PRIMARY KEY(comment_id)
);";

$postgresql_installation_array[PVDatabase::getContentCommentsTableName()]="CREATE TABLE  ".PVDatabase::getContentCommentsTableName()." (
	comment_id SERIAL NOT NULL,
	content_id integer NOT NULL DEFAULT  '0',
	owner_id integer NOT NULL DEFAULT  '0',
	owner_ip character varying( 100 ) NOT NULL DEFAULT  ''::character varying,
	comment_date TIMESTAMP NOT NULL DEFAULT now() ,
	comment_approved smallint NOT NULL DEFAULT  '1',
	comment_title character varying( 255 ) NOT NULL DEFAULT  '',
	comment_text TEXT NOT NULL DEFAULT  '',
	comment_parent integer NOT NULL DEFAULT  '0',
	comment_author character varying( 255 ) NOT NULL DEFAULT  ''::character varying,
	comment_author_email character varying( 255 ) NOT NULL DEFAULT  ''::character varying,
	comment_author_website character varying( 255 ) NOT NULL DEFAULT  ''::character varying,
	comment_type character varying( 255 ) NOT NULL DEFAULT  ''::character varying,
	PRIMARY KEY(comment_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentCommentsTableName()]="CREATE TABLE ".PVDatabase::getContentCommentsTableName()." (
	comment_id int IDENTITY (1,1) NOT NULL,
	content_id int DEFAULT 0 NOT NULL,
	owner_id int DEFAULT 0 NOT NULL,
	owner_ip varchar(255) DEFAULT '' NOT NULL,
	comment_date datetime NOT NULL,
	comment_approved tinyint DEFAULT 0 NOT NULL,
	comment_title varchar(255) DEFAULT '' NOT NULL,
	comment_text varchar(max) DEFAULT '' NOT NULL,
	comment_parent int DEFAULT 0 NOT NULL,
	comment_author varchar(255) DEFAULT '' NOT NULL,
	comment_author_email varchar(255) DEFAULT '' NOT NULL,
	comment_author_website varchar(255) DEFAULT '' NOT NULL,
	comment_type varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (comment_id))";

/*---------------------------------------------------------------------------------------------------
 * PV Content Rating
 *---------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getContentRatingTableName()]="CREATE TABLE ".PVDatabase::getContentRatingTableName()." (
    			rating_id INT NOT NULL AUTO_INCREMENT,
    			content_id INT NOT NULL DEFAULT 0,
    			comment_id INT NOT NULL DEFAULT 0,
   				user_id INT NOT NULL DEFAULT 0,
    			date_rated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    			date_rerated TIMESTAMP,
    			rating DOUBLE NOT NULL DEFAULT 0,
    			rating_type VARCHAR(255) NOT NULL DEFAULT '',
    			user_ip VARCHAR(255) NOT NULL DEFAULT '',
    			PRIMARY KEY( rating_id )
				);";

$postgresql_installation_array[PVDatabase::getContentRatingTableName()]="CREATE TABLE ".PVDatabase::getContentRatingTableName()." (
    			rating_id SERIAL NOT NULL,
    			content_id integer NOT NULL DEFAULT 0,
    			comment_id integer NOT NULL DEFAULT 0,
   				user_id integer NOT NULL DEFAULT 0,
    			date_rated timestamp without time zone DEFAULT now(),
    			date_rerated timestamp without time zone,
    			rating double precision NOT NULL DEFAULT 0,
    			rating_type character varying(255)  NOT NULL DEFAULT '',
    			user_ip character varying(255) NOT NULL DEFAULT '',
    			PRIMARY KEY( rating_id )
				);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentRatingTableName()]="CREATE TABLE ".PVDatabase::getContentRatingTableName()." (
	rating_id int IDENTITY (1,1) NOT NULL,
	content_id int DEFAULT 0 NOT NULL,
	comment_id int DEFAULT 0 NOT NULL,
	user_id int DEFAULT 0 NOT NULL,
	date_rated datetime DEFAULT 'CURRENT_TIMESTAMP' NOT NULL,
	date_rerated datetime NOT NULL,
	rating float DEFAULT 0 NOT NULL,
	rating_type varchar(255) DEFAULT '' NOT NULL,
	user_ip varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (rating_id))";


/*---------------------------------------------------------------------------------------------------
 * PV User Subscription
 *---------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getSubscriptionTableName()]="CREATE TABLE ".PVDatabase::getSubscriptionTableName()." (
    				subscription_id INT NOT NULL AUTO_INCREMENT,
    				content_id INT DEFAULT 0 NOT NULL,
    				comment_id INT DEFAULT 0 NOT NULL,
    				app_id INT DEFAULT 0 NOT NULL,
    				user_id INT DEFAULT 0 NOT NULL,
    				subscription_type VARCHAR(255) NOT NULL DEFAULT '',
    				subscription_approved TINYINT DEFAULT 0 NOT NULL,
    				subscription_active TINYINT DEFAULT 0 NOT NULL,
    				subscription_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    				subscription_start_date TIMESTAMP NOT NULL,
    				subscription_end_date TIMESTAMP NOT NULL,
    				user_ip VARCHAR(255) NOT NULL DEFAULT '',
    				PRIMARY KEY( subscription_id )
				);";

$postgresql_installation_array[PVDatabase::getSubscriptionTableName()]="CREATE TABLE ".PVDatabase::getSubscriptionTableName()." (
    				subscription_id SERIAL NOT NULL,
    				content_id integer DEFAULT 0 NOT NULL,
    				comment_id integer DEFAULT 0 NOT NULL,
    				app_id integer DEFAULT 0 NOT NULL,
    				user_id integer DEFAULT 0 NOT NULL,
    				subscription_type character varying(255) NOT NULL DEFAULT '',
    				subscription_approved smallint DEFAULT 0 NOT NULL,
    				subscription_active smallint DEFAULT 0 NOT NULL,
    				subscription_start_date timestamp without time zone,
    				subscription_end_date timestamp without time zone,
    				subscription_date timestamp without time zone DEFAULT now(),
    				user_ip character varying(255) NOT NULL DEFAULT '',
    				PRIMARY KEY( subscription_id )
				);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getSubscriptionTableName()]="CREATE TABLE ".PVDatabase::getSubscriptionTableName()." (
				subscription_id int IDENTITY (1,1) NOT NULL,
				content_id int DEFAULT 0 NOT NULL,
				comment_id int DEFAULT 0 NOT NULL,
				app_id int DEFAULT 0 NOT NULL,
				user_id int DEFAULT 0 NOT NULL,
				subscription_type varchar(255) DEFAULT '' NOT NULL,
				subscription_approved tinyint DEFAULT 0 NOT NULL,
				subscription_active tinyint DEFAULT 0 NOT NULL,
				subscription_date datetime DEFAULT 'CURRENT_TIMESTAMP' NOT NULL,
				subscription_start_date datetime NOT NULL,
				subscription_end_date datetime NOT NULL,
				user_ip varchar(255) DEFAULT '' NOT NULL,
				PRIMARY KEY (subscription_id))";


/*---------------------------------------------------------------------------------------------------
 * PV User Points
 *---------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getPointsTableName()]="CREATE TABLE ".PVDatabase::getPointsTableName()." (
			point_id INT NOT NULL AUTO_INCREMENT,
			user_id INT NOT NULL DEFAULT 0,
			content_id INT NOT NULL DEFAULT 0,
			comment_id INT NOT NULL DEFAULT 0,
			app_id INT NOT NULL DEFAULT 0,
			point_value DOUBLE NOT NULL DEFAULT 0,
			point_type VARCHAR( 255 ) NOT NULL DEFAULT '' ,
			user_ip VARCHAR( 255 ) NOT NULL DEFAULT '',
			point_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY( point_id )
)";

$postgresql_installation_array[PVDatabase::getPointsTableName()]="CREATE TABLE ".PVDatabase::getPointsTableName()." (
				point_id SERIAL NOT NULL,
				user_id integer NOT NULL DEFAULT '0',
				content_id integer NOT NULL DEFAULT '0',
				comment_id integer NOT NULL DEFAULT '0',
				app_id integer NOT NULL DEFAULT '0',
				point_value double precision NOT NULL DEFAULT '0',
				point_type character varying( 255 ) NOT NULL DEFAULT '',
				user_ip character varying( 255 ) NOT NULL DEFAULT '',
				point_date TIMESTAMP NOT NULL DEFAULT now(),
				PRIMARY KEY( point_id )
				);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getPointsTableName()]="CREATE TABLE ".PVDatabase::getPointsTableName()." (
	point_id int IDENTITY (1,1) NOT NULL,
	user_id int DEFAULT 0,
	content_id int DEFAULT 0,
	comment_id int DEFAULT 0,
	app_id int DEFAULT 0,
	point_value float DEFAULT 0,
	point_type varchar(255) DEFAULT '',
	user_ip varchar(255) DEFAULT '',
	point_date datetime DEFAULT 'CURRENT_TIMESTAMP',
	PRIMARY KEY (point_id))";

/*---------------------------------------------------------------------------------------------------
 * PV User Relationships
 *---------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getUserRelationsTableName()]="CREATE TABLE ".PVDatabase::getUserRelationsTableName()." (
    relationship_id INT NOT NULL AUTO_INCREMENT,
    requesting_user INT DEFAULT 0 NOT NULL,
    requested_user INT DEFAULT 0 NOT NULL,
    relationship_type VARCHAR(255) DEFAULT '' NOT NULL,
    relationship_status TINYINT NOT NULL DEFAULT 0,
    date_created TIMESTAMP NOT NULL DEFAULT now(),
    date_modified TIMESTAMP NOT NULL,
    PRIMARY KEY( relationship_id )
);";

$postgresql_installation_array[PVDatabase::getUserRelationsTableName()]="CREATE TABLE ".PVDatabase::getUserRelationsTableName()." (
    relationship_id SERIAL NOT NULL,
    requesting_user integer DEFAULT 0 NOT NULL,
    requested_user integer DEFAULT 0 NOT NULL,
    relationship_type character varying(255) DEFAULT ''::character varying NOT NULL,
    relationship_status smallint NOT NULL DEFAULT 0,
    date_created timestamp without time zone DEFAULT now() NOT NULL,
    date_modified timestamp without time zone NOT NULL,
    PRIMARY KEY( relationship_id )
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getUserRelationsTableName()]="CREATE TABLE ".PVDatabase::getUserRelationsTableName()." (
	relationship_id int IDENTITY (1,1) NOT NULL,
	requesting_user int DEFAULT 0 NOT NULL,
	requested_user int DEFAULT 0 NOT NULL,
	relationship_type varchar(255) DEFAULT '' NOT NULL,
	relationship_status tinyint DEFAULT 0 NOT NULL,
	date_created datetime DEFAULT 'CURRENT_TIMESTAMP' NOT NULL,
	date_modified datetime NOT NULL,
	PRIMARY KEY (relationship_id))";


/*---------------------------------------------------------------------------------------------------
 * Contet Category Installation
 *---------------------------------------------------------------------------------------------------*/
$mysql_installation_array[PVDatabase::getContentCategoriesTableName()]="CREATE TABLE ".PVDatabase::getContentCategoriesTableName()." (
			category_id INT AUTO_INCREMENT,
			parent_category INT NOT NULL DEFAULT 0,
    		category_name VARCHAR(255) NOT NULL DEFAULT '',
    		app_id INT NOT NULL DEFAULT 0,
    		category_unique_name VARCHAR(255) NOT NULL DEFAULT '',
    		category_alias VARCHAR(255) NOT NULL DEFAULT '',
    		category_order INT NOT NULL DEFAULT 0,
    		category_description TEXT NOT NULL DEFAULT '',
			category_type VARCHAR(255) NOT NULL DEFAULT '',
			category_owner INT NOT NULL DEFAULT 0,
    		PRIMARY KEY (category_id)
			);";

$postgresql_installation_array[PVDatabase::getContentCategoriesTableName()]="CREATE TABLE ".PVDatabase::getContentCategoriesTableName()." (
			category_id SERIAL NOT NULL,
			parent_category integer NOT NULL DEFAULT 0,
    		category_name character varying(255) NOT NULL DEFAULT ''::character varying,
    		app_id integer NOT NULL DEFAULT 0,
    		category_unique_name character varying(255) NOT NULL DEFAULT ''::character varying,
    		category_alias character varying(255) NOT NULL DEFAULT ''::character varying,
    		category_order integer NOT NULL DEFAULT 0,
    		category_description TEXT NOT NULL DEFAULT '',
			category_type character varying(255) NOT NULL DEFAULT ''::character varying,
			category_owner integer NOT NULL DEFAULT 0,
    		PRIMARY KEY (category_id)
			);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentCategoriesTableName()]="CREATE TABLE ".PVDatabase::getContentCategoriesTableName()." (
			category_id int IDENTITY (1,1) NOT NULL,
			parent_category int DEFAULT 0 NOT NULL,
			category_name varchar(255) DEFAULT '' NOT NULL,
			app_id int DEFAULT 0 NOT NULL,
			category_unique_name varchar(255) DEFAULT '' NOT NULL,
			category_alias varchar(255) DEFAULT '' NOT NULL,
			category_order int DEFAULT 0 NOT NULL,
			category_description varchar(max) DEFAULT '' NOT NULL,
			category_type varchar(255) DEFAULT '' NOT NULL,
			category_owner int DEFAULT 0 NOT NULL,
			PRIMARY KEY (category_id))";

/*---------------------------------------------------------------------------------------------------
 * Contet Category Relationships
 *---------------------------------------------------------------------------------------------------*/


$mysql_installation_array[PVDatabase::getContentCategoryRelationsTableName()]="CREATE TABLE ".PVDatabase::getContentCategoryRelationsTableName()." (
    			category_id INT DEFAULT 0 NOT NULL,
    			content_id INT NOT NULL DEFAULT 0,
				PRIMARY KEY (category_id, content_id)
				
);";

$postgresql_installation_array[PVDatabase::getContentCategoryRelationsTableName()]="CREATE TABLE ".PVDatabase::getContentCategoryRelationsTableName()." (
    			category_id integer DEFAULT 0 NOT NULL,
    			content_id integer NOT NULL DEFAULT 0,
				PRIMARY KEY (category_id, content_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentCategoryRelationsTableName()]="CREATE TABLE ".PVDatabase::getContentCategoryRelationsTableName()." (
		category_id int DEFAULT 0 NOT NULL,
		content_id int DEFAULT 0 NOT NULL,
		PRIMARY KEY (category_id, content_id)
		);";


/*---------------------------------------------------------------------------------------------------
 * Contet Category Relationships
 *---------------------------------------------------------------------------------------------------*/


$mysql_installation_array[PVDatabase::getContentRelationsTableName()]="CREATE TABLE ".PVDatabase::getContentRelationsTableName()." (
    			content_id INT NOT NULL,
				related_content_id INT NOT NULL,
				content_relationship_type VARCHAR(255) NOT NULL DEFAULT '',
				content_relationship_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (content_id, related_content_id,content_relationship_type )
);";

$postgresql_installation_array[PVDatabase::getContentRelationsTableName()]="CREATE TABLE ".PVDatabase::getContentRelationsTableName()." (
    			content_id integer NOT NULL,
				related_content_id integer NOT NULL,
				content_relationship_type character varying(255) NOT NULL DEFAULT '',
				content_relationship_date timestamp without time zone DEFAULT now() NOT NULL,
				PRIMARY KEY (content_id, related_content_id,content_relationship_type )
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentRelationsTableName()]="CREATE TABLE ".PVDatabase::getContentRelationsTableName()." (
		content_id INT NOT NULL ,
		related_content_id INT  NOT NULL,
		content_relationship_type VARCHAR(255) NOT NULL DEFAULT '',
		content_relationship_date datetime DEFAULT 'CURRENT_TIMESTAMP' NOT NULL,
		PRIMARY KEY (content_id, related_content_id,content_relationship_type )
);";

/*-------------------------------------------------------------------------------------------------------*/
/*Content Audio Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getAudioContentTableName()]="CREATE TABLE ".PVDatabase::getAudioContentTableName()." (
		    audio_id INT NOT NULL,
		    audio_length VARCHAR(255) NOT NULL DEFAULT '',
		    mid_file VARCHAR(255) NOT NULL DEFAULT '',
		    wav_file VARCHAR(255) NOT NULL DEFAULT '',
		    aif_file VARCHAR(255) NOT NULL DEFAULT '',
		    mp3_file VARCHAR(255) NOT NULL DEFAULT '',
		    ra_file VARCHAR(255) NOT NULL DEFAULT '',
		    oga_file VARCHAR(255) NOT NULL DEFAULT '',
		    sample_length VARCHAR(255) NOT NULL DEFAULT '',
		    audio_src VARCHAR(255) NOT NULL DEFAULT '',
		    audio_type VARCHAR(255) NOT NULL DEFAULT '',
		    PRIMARY KEY(audio_id)
);";

$postgresql_installation_array[PVDatabase::getAudioContentTableName()]="CREATE TABLE ".PVDatabase::getAudioContentTableName()." (
		    audio_id integer NOT NULL,
		    audio_length character varying(255) NOT NULL DEFAULT ''::character varying,
		    mid_file character varying(255) NOT NULL DEFAULT ''::character varying,
		    wav_file character varying(255) NOT NULL DEFAULT ''::character varying,
		    aif_file character varying(255) NOT NULL DEFAULT ''::character varying,
		    mp3_file character varying(255) NOT NULL DEFAULT ''::character varying,
		    ra_file character varying(255) NOT NULL DEFAULT ''::character varying,
		    oga_file character varying(255) NOT NULL DEFAULT ''::character varying,
		    sample_length character varying(255) NOT NULL DEFAULT ''::character varying,
		    audio_src character varying(255) NOT NULL DEFAULT ''::character varying,
		    audio_type character varying(255) NOT NULL DEFAULT ''::character varying,
		    PRIMARY KEY(audio_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getAudioContentTableName()]="CREATE TABLE ".PVDatabase::getAudioContentTableName()." (
			audio_id int DEFAULT 0 NOT NULL,
			audio_length varchar(255) DEFAULT '' NOT NULL,
			mid_file varchar(255) DEFAULT '' NOT NULL,
			wav_file varchar(255) DEFAULT '' NOT NULL,
			aif_file varchar(255) DEFAULT '' NOT NULL,
			mp3_file varchar(255) DEFAULT '' NOT NULL,
			ra_file varchar(255) DEFAULT '' NOT NULL,
			oga_file varchar(255) DEFAULT '' NOT NULL,
			sample_length varchar(255) DEFAULT '' NOT NULL,
			audio_src varchar(255) DEFAULT '' NOT NULL,
			audio_type varchar(255) DEFAULT '' NOT NULL,
			PRIMARY KEY (audio_id))";

/*-------------------------------------------------------------------------------------------------------*/
/*Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/


$mysql_installation_array[PVDatabase::getContentTableName()]="CREATE TABLE ".PVDatabase::getContentTableName()." (
    content_id INT NOT NULL auto_increment,
    parent_content INT DEFAULT 0 NOT NULL,
    app_id INT DEFAULT 0 NOT NULL,
    owner_id INT DEFAULT 0 NOT NULL,
    content_title VARCHAR(255) NOT NULL DEFAULT '',
    content_description text NOT NULL DEFAULT '',
    content_meta_tags VARCHAR(255) NOT NULL DEFAULT '',
    content_meta_description VARCHAR(255) NOT NULL DEFAULT '',
    content_thumbnail VARCHAR(255) NOT NULL DEFAULT '',
    content_alias VARCHAR(255) NOT NULL DEFAULT '',
    date_created timestamp NOT NULL DEFAULT now(),
    date_modified timestamp NOT NULL,
    date_active timestamp NOT NULL DEFAULT '00:00:00',
    date_inactive timestamp,
    is_searchable TINYINT NOT NULL DEFAULT 0,
    allow_comments TINYINT NOT NULL DEFAULT 0,
    allow_rating TINYINT NOT NULL DEFAULT 0,
    content_active TINYINT NOT NULL DEFAULT 0,
    content_promoted TINYINT NOT NULL DEFAULT 0,
    content_permissions text NOT NULL DEFAULT '',
    content_type VARCHAR(255) NOT NULL DEFAULT '',
    content_language VARCHAR(255) NOT NULL DEFAULT '',
    translate_content TINYINT NOT NULL DEFAULT 0,
    content_approved TINYINT NOT NULL DEFAULT 0,
    content_category INT NOT NULL DEFAULT 0,
    content_parameters text NOT NULL DEFAULT '',
    sym_link VARCHAR(255) NOT NULL DEFAULT '',
    content_order INT NOT NULL DEFAULT 0,
	content_access_level INT NOT NULL DEFAULT 0,
    PRIMARY KEY (content_id)
);";

$postgresql_installation_array[PVDatabase::getContentTableName()]="CREATE TABLE ".PVDatabase::getContentTableName()." (
    content_id SERIAL NOT NULL,
    parent_content integer DEFAULT 0 NOT NULL,
    app_id integer DEFAULT 0 NOT NULL,
    owner_id integer DEFAULT 0 NOT NULL,
    content_title character varying(255) DEFAULT ''::character varying NOT NULL,
    content_description text DEFAULT ''::text NOT NULL,
    content_meta_tags character varying(255) DEFAULT ''::character varying NOT NULL,
    content_meta_description character varying(255) DEFAULT ''::character varying NOT NULL,
    content_thumbnail character varying(255) DEFAULT ''::character varying NOT NULL,
    content_alias character varying(255) DEFAULT ''::character varying NOT NULL,
    date_created timestamp without time zone DEFAULT now() NOT NULL,
    date_modified timestamp without time zone NOT NULL,
    date_active timestamp without time zone DEFAULT now() NOT NULL,
    date_inactive timestamp without time zone NOT NULL,
    is_searchable smallint DEFAULT 0 NOT NULL,
    allow_comments smallint DEFAULT 0 NOT NULL,
    allow_rating smallint DEFAULT 0 NOT NULL,
    content_active smallint DEFAULT 0 NOT NULL,
    content_promoted smallint DEFAULT 0 NOT NULL,
    content_permissions text DEFAULT ''::text NOT NULL,
    content_type character varying(255) DEFAULT ''::character varying NOT NULL,
    content_language character varying(255) DEFAULT ''::character varying NOT NULL,
    translate_content smallint DEFAULT 0 NOT NULL,
    content_approved smallint DEFAULT 0 NOT NULL,
    content_category integer DEFAULT 0 NOT NULL,
    content_parameters text DEFAULT ''::text NOT NULL,
    sym_link character varying(255) DEFAULT ''::character varying NOT NULL,
    content_order integer DEFAULT 0 NOT NULL,
	content_access_level integer DEFAULT 0 NOT NULL,
    PRIMARY KEY (content_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentTableName()]="CREATE TABLE ".PVDatabase::getContentTableName()." (
    content_id int IDENTITY (1,1) NOT NULL,
    parent_content INT DEFAULT 0 NOT NULL,
    app_id INT DEFAULT 0 NOT NULL,
    owner_id INT DEFAULT 0 NOT NULL,
    content_title VARCHAR(255) DEFAULT '' NOT NULL, 
    content_description VARCHAR(max) DEFAULT '' NOT NULL,
    content_meta_tags VARCHAR(255) DEFAULT '' NOT NULL,
    content_meta_description VARCHAR(255) DEFAULT '' NOT NULL,
    content_thumbnail VARCHAR(255) DEFAULT '' NOT NULL,
    content_alias VARCHAR(255) DEFAULT '' NOT NULL,
    date_created datetime DEFAULT 'CURRENT_TIMESTAMP' NOT NULL,
    date_modified datetime NOT NULL,
    date_active datetime DEFAULT '00:00:00' NOT NULL,
    date_inactive datetime NOT NULL,
    is_searchable TINYINT DEFAULT 0 NOT NULL,
    allow_comments TINYINT DEFAULT 0 NOT NULL,
    allow_rating TINYINT DEFAULT 0 NOT NULL,
    content_active TINYINT DEFAULT 0 NOT NULL,
    content_promoted TINYINT DEFAULT 0 NOT NULL,
    content_permissions varchar(max) DEFAULT '' NOT NULL,
    content_type VARCHAR(255) DEFAULT '' NOT NULL,
    content_language VARCHAR(255) DEFAULT '' NOT NULL,
    translate_content TINYINT DEFAULT 0 NOT NULL,
    content_approved TINYINT DEFAULT 0 NOT NULL,
    content_category INT DEFAULT 0 NOT NULL,
    content_parameters varchar(max) DEFAULT '' NOT NULL,
    sym_link VARCHAR(255) DEFAULT '' NOT NULL,
    content_order INT DEFAULT 0 NOT NULL,
	content_access_level INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (content_id)
);";

/*-------------------------------------------------------------------------------------------------------*/
/*Content Type Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getContentTypeTableName()]="CREATE TABLE ".PVDatabase::getContentTypeTableName()." (
    content_type VARCHAR(255) NOT NULL,
    parent_type VARCHAR(255) DEFAULT '' NOT NULL,
    content_name VARCHAR(255) DEFAULT '' NOT NULL,
    content_description text DEFAULT '' NOT NULL,
    PRIMARY KEY (content_type)
);";

$postgresql_installation_array[PVDatabase::getContentTypeTableName()]="CREATE TABLE ".PVDatabase::getContentTypeTableName()." (
    content_type character varying(255) NOT NULL,
    parent_type character varying(255) DEFAULT ''::character varying NOT NULL,
    content_name character varying(255) DEFAULT ''::character varying NOT NULL,
    content_description text DEFAULT ''::text NOT NULL,
    PRIMARY KEY (content_type)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentTypeTableName()]="CREATE TABLE ".PVDatabase::getContentTypeTableName()." (
    content_type VARCHAR(255) NOT NULL,
    parent_type VARCHAR(255) DEFAULT '' NOT NULL,
    content_name VARCHAR(255) DEFAULT '' NOT NULL,
    content_description VARCHAR(max) DEFAULT '' NOT NULL,
    PRIMARY KEY (content_type)
);";

/*-------------------------------------------------------------------------------------------------------*/
/*Product Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getProductContentTableName()]="CREATE TABLE ".PVDatabase::getProductContentTableName()." (
  product_id int(11) NOT NULL,
  product_sku varchar(255) NOT NULL DEFAULT '',
  product_idsku varchar(255) NOT NULL DEFAULT '',
  product_vendor_id int(11) NOT NULL DEFAULT 0,
  product_quantity int(11) NOT NULL DEFAULT 0,
  product_price double NOT NULL DEFAULT 0,
  product_discount_price double NOT NULL DEFAULT 0,
  product_size varchar(255) NOT NULL DEFAULT '',
  product_color varchar(255) NOT NULL DEFAULT '',
  product_weight double NOT NULL DEFAULT 0,
  product_height double NOT NULL DEFAULT 0,
  product_length double NOT NULL DEFAULT 0,
  product_currency varchar(255) NOT NULL DEFAULT '',
  product_in_stock smallint(6) NOT NULL DEFAULT 0,
  product_type varchar(255) NOT NULL DEFAULT '',
  product_tax_id int(11) NOT NULL DEFAULT 0,
  product_attribute text NOT NULL DEFAULT '',
  product_version double NOT NULL DEFAULT 0,
  PRIMARY KEY (product_id)
); ";

$postgresql_installation_array[PVDatabase::getProductContentTableName()]="CREATE TABLE ".PVDatabase::getProductContentTableName()." (
  product_id integer NOT NULL,
  product_sku character varying(255) NOT NULL DEFAULT '',
  product_idsku character varying(255) NOT NULL DEFAULT '',
  product_vendor_id integer NOT NULL DEFAULT 0,
  product_quantity integer NOT NULL DEFAULT 0,
  product_price double precision NOT NULL DEFAULT 0,
  product_discount_price double precision NOT NULL DEFAULT 0,
  product_size character varying(255) NOT NULL DEFAULT '',
  product_color character varying(255) NOT NULL DEFAULT '',
  product_weight double precision NOT NULL DEFAULT 0,
  product_height double precision NOT NULL DEFAULT 0,
  product_length double precision NOT NULL DEFAULT 0,
  product_currency character varying(255) NOT NULL DEFAULT '',
  product_in_stock smallint NOT NULL DEFAULT 0,
  product_type character varying(255) NOT NULL DEFAULT '',
  product_tax_id integer NOT NULL DEFAULT 0,
  product_attribute text NOT NULL DEFAULT '',
  product_version double precision NOT NULL DEFAULT 0,
  PRIMARY KEY (product_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getProductContentTableName()]="CREATE TABLE ".PVDatabase::getProductContentTableName()." (
  product_id int IDENTITY (1,1) NOT NULL,
  product_sku varchar(255) NOT NULL DEFAULT '',
  product_idsku varchar(255) NOT NULL DEFAULT '',
  product_vendor_id int NOT NULL DEFAULT 0,
  product_quantity int NOT NULL DEFAULT 0,
  product_price float NOT NULL DEFAULT 0,
  product_discount_price float NOT NULL DEFAULT 0,
  product_size varchar(255) NOT NULL DEFAULT '',
  product_color varchar(255) NOT NULL DEFAULT '',
  product_weight float NOT NULL DEFAULT 0,
  product_height float NOT NULL DEFAULT 0,
  product_length float NOT NULL DEFAULT 0,
  product_currency varchar(255) NOT NULL DEFAULT '',
  product_in_stock smallint NOT NULL DEFAULT 0,
  product_type varchar(255) NOT NULL DEFAULT '',
  product_tax_id int NOT NULL DEFAULT 0,
  product_attribute varchar(max) NOT NULL DEFAULT '',
  product_version float NOT NULL DEFAULT 0,
  PRIMARY KEY (product_id)
);";


/*-------------------------------------------------------------------------------------------------------*/
/*File Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getFileContentTableName()]="CREATE TABLE ".PVDatabase::getFileContentTableName()." (
    file_id INT DEFAULT 0 NOT NULL,
    file_type VARCHAR(255) DEFAULT '' NOT NULL,
    file_size INT DEFAULT 0 NOT NULL,
    file_location VARCHAR(255) DEFAULT '' NOT NULL,
    file_name VARCHAR(255) DEFAULT '' NOT NULL,
    file_src VARCHAR(255) DEFAULT '' NOT NULL,
    file_downloadable TINYINT NOT NULL DEFAULT 0,
    file_max_downloads INT NOT NULL DEFAULT 0,
    file_version DOUBLE NOT NULL DEFAULT 0,
    file_license VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (file_id)
);";

$postgresql_installation_array[PVDatabase::getFileContentTableName()]="CREATE TABLE ".PVDatabase::getFileContentTableName()." (
    file_id integer DEFAULT 0 NOT NULL,
    file_type character varying(255) DEFAULT ''::character varying NOT NULL,
    file_size integer DEFAULT 0 NOT NULL,
    file_location character varying(255) DEFAULT ''::character varying NOT NULL,
    file_name character varying(255) DEFAULT ''::character varying NOT NULL,
    file_src character varying(255) DEFAULT ''::character varying NOT NULL,
    file_downloadable smallint NOT NULL DEFAULT 0,
    file_max_downloads integer NOT NULL DEFAULT 0,
    file_version double precision NOT NULL DEFAULT 0,
    file_license character varying(255) NOT NULL DEFAULT '',
    PRIMARY KEY (file_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getFileContentTableName()]="CREATE TABLE ".PVDatabase::getFileContentTableName()." (
    file_id INT DEFAULT 0 NOT NULL,
    file_type VARCHAR(255) DEFAULT '' NOT NULL,
    file_size INT DEFAULT 0 NOT NULL,
    file_location VARCHAR(255) DEFAULT '' NOT NULL,
    file_name VARCHAR(255) DEFAULT '' NOT NULL,
    file_src VARCHAR(255) DEFAULT '' NOT NULL,
    file_downloadable TINYINT NOT NULL DEFAULT 0,
    file_max_downloads INT NOT NULL DEFAULT 0,
    file_version float NOT NULL DEFAULT 0,
    file_license VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (file_id)
);";

/*-------------------------------------------------------------------------------------------------------*/
/*Event Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/


$mysql_installation_array[PVDatabase::getEventContentTableName()]="CREATE TABLE ".PVDatabase::getEventContentTableName()." (
  event_id int(11) NOT NULL DEFAULT 0,
  event_location text NOT NULL DEFAULT '',
  event_start_date datetime NOT NULL DEFAULT '00:00:00',
  event_end_date datetime NOT NULL DEFAULT '00:00:00',
  event_country varchar(255) NOT NULL DEFAULT '',
  event_address varchar(255) NOT NULL DEFAULT '',
  event_city varchar(255) NOT NULL DEFAULT '',
  event_state varchar(255) NOT NULL DEFAULT '',
  event_zip varchar(255) NOT NULL DEFAULT '',
  event_longitude varchar(255) NOT NULL DEFAULT '',
  event_latitude varchar(255) NOT NULL DEFAULT '',
  event_src varchar(255) NOT NULL DEFAULT '',
  event_contact varchar(255) NOT NULL DEFAULT '',
  event_map text NOT NULL DEFAULT '',
  undefined_endtime TINYINT DEFAULT 0 NOT NULL,
  PRIMARY KEY  (event_id)
);";

$postgresql_installation_array[PVDatabase::getEventContentTableName()]="CREATE TABLE ".PVDatabase::getEventContentTableName()." (
  event_id integer DEFAULT 0 NOT NULL,
  event_location text NOT NULL DEFAULT '',
  event_start_date timestamp NOT NULL DEFAULT now(),
  event_end_date timestamp NOT NULL DEFAULT now(),
  event_country character varying(255) NOT NULL DEFAULT ''::character varying,
  event_address character varying(255) NOT NULL DEFAULT ''::character varying,
  event_city character varying(255) NOT NULL DEFAULT ''::character varying,
  event_state character varying(255) NOT NULL DEFAULT ''::character varying,
  event_zip character varying(255) NOT NULL DEFAULT ''::character varying,
  event_longitude character varying(255) NOT NULL DEFAULT ''::character varying,
  event_latitude character varying(255) NOT NULL DEFAULT ''::character varying,
  event_src character varying(255) NOT NULL DEFAULT '::character varying',
  event_contact character varying(255) NOT NULL DEFAULT '::character varying',
  event_map text NOT NULL DEFAULT '',
  undefined_endtime smallint DEFAULT 0 NOT NULL,
  PRIMARY KEY  (event_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getEventContentTableName()]="CREATE TABLE ".PVDatabase::getEventContentTableName()." (
  event_id int NOT NULL DEFAULT 0,
  event_location text NOT NULL DEFAULT '',
  event_start_date datetime NOT NULL DEFAULT '',
  event_end_date datetime NOT NULL DEFAULT '',
  event_country varchar(255) NOT NULL DEFAULT '',
  event_address varchar(255) NOT NULL DEFAULT '',
  event_city varchar(255) NOT NULL DEFAULT '',
  event_state varchar(255) NOT NULL DEFAULT '',
  event_zip varchar(255) NOT NULL DEFAULT '',
  event_longitude varchar(255) NOT NULL DEFAULT '',
  event_latitude varchar(255) NOT NULL DEFAULT '',
  event_src varchar(255) NOT NULL DEFAULT '',
  event_contact varchar(255) NOT NULL DEFAULT '',
  event_map varchar(max) NOT NULL DEFAULT '',
  undefined_endtime TINYINT DEFAULT 0 NOT NULL,
  PRIMARY KEY  (event_id)
);";

/*-------------------------------------------------------------------------------------------------------*/
/*Image Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getImageContentTableName()]="CREATE TABLE ".PVDatabase::getImageContentTableName()." (
    image_id INT NOT NULL DEFAULT 0,
    image_type VARCHAR(20) DEFAULT '' NOT NULL,
    image_size INT DEFAULT 0 NOT NULL,
    image_url VARCHAR(255) DEFAULT '' NOT NULL,
    thumb_url VARCHAR(255) DEFAULT '' NOT NULL,
    image_width INT DEFAULT 0 NOT NULL,
    image_height INT DEFAULT 0 NOT NULL,
    thumb_width INT DEFAULT 0 NOT NULL,
    thumb_height INT DEFAULT 0 NOT NULL,
    image_src VARCHAR(255) DEFAULT ''NOT NULL,
    PRIMARY KEY (image_id)
);";

$postgresql_installation_array[PVDatabase::getImageContentTableName()]="CREATE TABLE ".PVDatabase::getImageContentTableName()." (
    image_id integer NOT NULL,
    image_type character varying(20) DEFAULT ''::character varying NOT NULL,
    image_size integer DEFAULT 0 NOT NULL,
    image_url character varying(255) DEFAULT ''::character varying NOT NULL,
    thumb_url character varying(255) DEFAULT ''::character varying NOT NULL,
    image_width integer DEFAULT 0 NOT NULL,
    image_height integer DEFAULT 0 NOT NULL,
    thumb_width integer DEFAULT 0 NOT NULL,
    thumb_height integer DEFAULT 0 NOT NULL,
    image_src character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (image_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getImageContentTableName()]="CREATE TABLE ".PVDatabase::getImageContentTableName()." (
    image_id INT NOT NULL DEFAULT 0,
    image_type VARCHAR(20) DEFAULT '' NOT NULL,
    image_size INT DEFAULT 0 NOT NULL,
    image_url VARCHAR(255) DEFAULT '' NOT NULL,
    thumb_url VARCHAR(255) DEFAULT '' NOT NULL,
    image_width INT DEFAULT 0 NOT NULL,
    image_height INT DEFAULT 0 NOT NULL,
    thumb_width INT DEFAULT 0 NOT NULL,
    thumb_height INT DEFAULT 0 NOT NULL,
    image_src VARCHAR(255) DEFAULT ''NOT NULL,
    PRIMARY KEY (image_id)
);";

/*-------------------------------------------------------------------------------------------------------*/
/*Video Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getVideoContentTableName()]="CREATE TABLE ".PVDatabase::getVideoContentTableName()." (
    video_id INT NOT NULL,
    video_type VARCHAR(255) DEFAULT '' NOT NULL,
    video_length VARCHAR(255) DEFAULT '' NOT NULL,
    video_allow_embedding smallint DEFAULT 0 NOT NULL,
    flv_file VARCHAR(255) DEFAULT '' NOT NULL,
    mp4_file VARCHAR(255) DEFAULT '' NOT NULL,
    wmv_file VARCHAR(255) DEFAULT '' NOT NULL,
    mpeg_file VARCHAR(255) DEFAULT '' NOT NULL,
    rm_file VARCHAR(255) DEFAULT '' NOT NULL,
    avi_file VARCHAR(255) DEFAULT '' NOT NULL,
    mov_file VARCHAR(255) DEFAULT '' NOT NULL,
    asf_file VARCHAR(255) DEFAULT '' NOT NULL,
    ogv_file VARCHAR(255) DEFAULT '' NOT NULL,
    webm_file VARCHAR(255) DEFAULT '' NOT NULL,
    enable_hq TINYINT DEFAULT 0 NOT NULL,
    auto_hq TINYINT DEFAULT 0 NOT NULL,
    video_src VARCHAR(255) DEFAULT '' NOT NULL,
    video_embed text DEFAULT '' NOT NULL,
    PRIMARY KEY (video_id)
);";

$postgresql_installation_array[PVDatabase::getVideoContentTableName()]="CREATE TABLE ".PVDatabase::getVideoContentTableName()." (
    video_id integer DEFAULT 0 NOT NULL,
    video_type character varying(255) DEFAULT ''::character varying NOT NULL,
    video_length character varying(255) DEFAULT ''::character varying NOT NULL,
    video_allow_embedding smallint DEFAULT 0 NOT NULL,
    flv_file character varying(255) DEFAULT ''::character varying NOT NULL,
    mp4_file character varying(255) DEFAULT ''::character varying NOT NULL,
    wmv_file character varying(255) DEFAULT ''::character varying NOT NULL,
    mpeg character varying(255) DEFAULT ''::character varying NOT NULL,
    rm_file character varying(255) DEFAULT ''::character varying NOT NULL,
    avi_file character varying(255) DEFAULT ''::character varying NOT NULL,
    mov_file character varying(255) DEFAULT ''::character varying NOT NULL,
    asf_file character varying(255) DEFAULT ''::character varying NOT NULL,
    ogv_file character varying(255) DEFAULT ''::character varying NOT NULL,
    webm_file character varying(255) DEFAULT ''::character varying NOT NULL,
    enable_hq smallint DEFAULT 0 NOT NULL,
    auto_hq smallint DEFAULT 0 NOT NULL,
    video_src character varying(255) DEFAULT ''::character varying NOT NULL,
    video_embed text DEFAULT '' NOT NULL,
    PRIMARY KEY (video_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getVideoContentTableName()]="CREATE TABLE ".PVDatabase::getVideoContentTableName()." (
    video_id INT NOT NULL,
    video_type VARCHAR(255) DEFAULT '' NOT NULL,
    video_length VARCHAR(255) DEFAULT '' NOT NULL,
    video_allow_embedding smallint DEFAULT 0 NOT NULL,
    flv_file VARCHAR(255) DEFAULT '' NOT NULL,
    mp4_file VARCHAR(255) DEFAULT '' NOT NULL,
    wmv_file VARCHAR(255) DEFAULT '' NOT NULL,
    mpeg_file VARCHAR(255) DEFAULT '' NOT NULL,
    rm_file VARCHAR(255) DEFAULT '' NOT NULL,
    avi_file VARCHAR(255) DEFAULT '' NOT NULL,
    mov_file VARCHAR(255) DEFAULT '' NOT NULL,
    asf_file VARCHAR(255) DEFAULT '' NOT NULL,
    ogv_file VARCHAR(255) DEFAULT '' NOT NULL,
    webm_file VARCHAR(255) DEFAULT '' NOT NULL,
    enable_hq TINYINT DEFAULT 0 NOT NULL,
    auto_hq TINYINT DEFAULT 0 NOT NULL,
    video_src VARCHAR(255) DEFAULT '' NOT NULL,
    video_embed varchar(max) DEFAULT '' NOT NULL,
    PRIMARY KEY (video_id)
);";

/*-------------------------------------------------------------------------------------------------------*/
/* Text Content Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getTextContentTableName()]="CREATE TABLE ".PVDatabase::getTextContentTableName()." (
    text_id INT DEFAULT 0 NOT NULL,
    text_content text DEFAULT '' NOT NULL,
    text_page_group INT DEFAULT 0 NOT NULL,
    text_page_number INT DEFAULT 0 NOT NULL,
    text_section INT DEFAULT 0 NOT NULL,
    text_src VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (text_id)
);";

$postgresql_installation_array[PVDatabase::getTextContentTableName()]="CREATE TABLE ".PVDatabase::getTextContentTableName()." (
    text_id integer DEFAULT 0 NOT NULL,
    text_content text DEFAULT ''::text NOT NULL,
    text_page_group integer DEFAULT 0 NOT NULL,
    text_page_number integer DEFAULT 0 NOT NULL,
    text_section integer DEFAULT 0 NOT NULL,
    text_src character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (text_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getTextContentTableName()]="CREATE TABLE ".PVDatabase::getTextContentTableName()." (
    text_id INT DEFAULT 0 NOT NULL,
    text_content varchar(max) DEFAULT '' NOT NULL,
    text_page_group INT DEFAULT 0 NOT NULL,
    text_page_number INT DEFAULT 0 NOT NULL,
    text_section INT DEFAULT 0 NOT NULL,
    text_src VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (text_id)
);";


/*-------------------------------------------------------------------------------------------------------*/
/* Content Views Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getContentViewsTableName()]="CREATE TABLE ".PVDatabase::getContentViewsTableName()." (
    view_id INT NOT NULL auto_increment,
    content_id INT NOT NULL,
    user_id INT DEFAULT 0 NOT NULL,
    user_ip VARCHAR(255) DEFAULT '' NOT NULL,
    viewed_date timestamp DEFAULT now() NOT NULL,
    PRIMARY KEY (view_id, content_id)
);";

$postgresql_installation_array[PVDatabase::getContentViewsTableName()]="CREATE TABLE ".PVDatabase::getContentViewsTableName()." (
    view_id SERIAL NOT NULL ,
    content_id integer NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_ip character varying(255) DEFAULT ''::character varying NOT NULL,
    viewed_date timestamp without time zone DEFAULT now() NOT NULL,
    PRIMARY KEY (view_id, content_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentViewsTableName()]="CREATE TABLE ".PVDatabase::getContentViewsTableName()." (
    view_id INT IDENTITY (1,1) NOT NULL,
    content_id INT NOT NULL,
    user_id INT DEFAULT 0 NOT NULL,
    user_ip VARCHAR(255) DEFAULT '' NOT NULL,
    viewed_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (view_id, content_id)
);";

/*-------------------------------------------------------------------------------------------------------*/
/* Content Views Installation Script*/
/*-------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getContentModifiersTableName()]="CREATE TABLE ".PVDatabase::getContentModifiersTableName()." (
    view_id INT NOT NULL auto_increment,
    content_id INT NOT NULL,
    user_id INT DEFAULT 0 NOT NULL,
    user_ip VARCHAR(255) DEFAULT '' NOT NULL,
    modified_date timestamp DEFAULT now() NOT NULL,
    PRIMARY KEY (view_id, content_id)
);";

$postgresql_installation_array[PVDatabase::getContentModifiersTableName()]="CREATE TABLE ".PVDatabase::getContentModifiersTableName()." (
    view_id SERIAL NOT NULL,
    content_id integer NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_ip character varying(255) DEFAULT ''::character varying NOT NULL,
    modified_date timestamp without time zone DEFAULT now() NOT NULL,
    PRIMARY KEY (view_id, content_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentModifiersTableName()]="CREATE TABLE ".PVDatabase::getContentModifiersTableName()." (
    view_id INT IDENTITY (1,1) NOT NULL,
    content_id INT NOT NULL,
    user_id INT DEFAULT 0 NOT NULL,
    user_ip VARCHAR(255) DEFAULT '' NOT NULL,
    modified_date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (view_id, content_id)
);";


/*-------------------------------------------------------------------------------------------------------
 * PV Fields
 * --------------------------------------------------------------------------------------------------------*/

//Create PVDatabase::fields
$mysql_installation_array[PVDatabase::getFieldsTableName()]="CREATE TABLE ".PVDatabase::getFieldsTableName()." (
    field_id INT NOT NULL auto_increment,
    field_name VARCHAR(255) DEFAULT '' NOT NULL,
    field_type VARCHAR(255) DEFAULT '' NOT NULL,
    field_description text DEFAULT '' NOT NULL,
    field_title VARCHAR(255) DEFAULT '' NOT NULL,
    max_length INT DEFAULT 0 NOT NULL,
    max_size INT DEFAULT 0 NOT NULL,
    field_columns INT DEFAULT 0 NOT NULL,
    field_rows INT DEFAULT 0 NOT NULL,
    field_value VARCHAR(255) DEFAULT '' NOT NULL,
    searchable TINYINT DEFAULT 1 NOT NULL,
    readonly TINYINT DEFAULT 0 NOT NULL,
    show_title TINYINT DEFAULT 1 NOT NULL,
    enabled TINYINT DEFAULT 1 NOT NULL,
    show_creation TINYINT DEFAULT 0 NOT NULL,
    is_required TINYINT DEFAULT 0 NOT NULL,
    on_blur text DEFAULT '' NOT NULL,
    id VARCHAR(255) DEFAULT '' NOT NULL,
    on_change VARCHAR(255) DEFAULT '' NOT NULL,
    on_click VARCHAR(255) DEFAULT '' NOT NULL,
    on_doubelclick VARCHAR(255) DEFAULT '' NOT NULL,
    on_focus VARCHAR(255) DEFAULT '' NOT NULL,
    on_keydown VARCHAR(255) DEFAULT '' NOT NULL,
    on_keyup VARCHAR(255) DEFAULT '',
    on_keypress VARCHAR(255) DEFAULT '' NOT NULL,
    on_mousedown VARCHAR(255) DEFAULT '' NOT NULL,
    on_mouseup VARCHAR(255) DEFAULT '' NOT NULL,
    on_mousemove VARCHAR(255) DEFAULT '' NOT NULL,
    on_mouseover VARCHAR(255) DEFAULT '' NOT NULL,
    on_mouseout VARCHAR(255) DEFAULT '' NOT NULL,
    instructions text DEFAULT '' NOT NULL,
    show_instructions TINYINT DEFAULT 0 NOT NULL,
    checked TINYINT DEFAULT 0 NOT NULL,
    disabled TINYINT DEFAULT 0 NOT NULL,
    lang VARCHAR(2) DEFAULT '' NOT NULL,
    align VARCHAR(255) DEFAULT '' NOT NULL,
    accept VARCHAR(255) DEFAULT '' NOT NULL,
    field_class VARCHAR(255) DEFAULT '' NOT NULL,
    field_size INT DEFAULT 0 NOT NULL,
    admin_editable TINYINT DEFAULT 1 NOT NULL,
    previewable TINYINT DEFAULT 0 NOT NULL,
    is_deleted TINYINT DEFAULT 0 NOT NULL,
    display_name VARCHAR(255) DEFAULT '' NOT NULL,
    app_id INT DEFAULT 0 NOT NULL,
    field_prefix VARCHAR(255) DEFAULT '' NOT NULL,
    field_suffix VARCHAR(255) DEFAULT '' NOT NULL,
    field_css text DEFAULT '' NOT NULL,
    owner_id INT DEFAULT 0 NOT NULL,
    field_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    content_type VARCHAR(255) DEFAULT '' NOT NULL,
    field_order INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (field_id)
);";

$postgresql_installation_array[PVDatabase::getFieldsTableName()]="CREATE TABLE ".PVDatabase::getFieldsTableName()." (
    field_id SERIAL NOT NULL,
    field_name character varying(255) DEFAULT ''::character varying NOT NULL,
    field_type character varying(255) DEFAULT ''::character varying NOT NULL,
    field_description text DEFAULT ''::text NOT NULL,
    field_title character varying(255) DEFAULT ''::character varying NOT NULL,
    max_length integer DEFAULT 0 NOT NULL,
    max_size integer DEFAULT 0 NOT NULL,
    field_columns integer DEFAULT 0 NOT NULL,
    field_rows integer DEFAULT 0 NOT NULL,
    field_value character varying(255) DEFAULT ''::character varying NOT NULL,
    searchable smallint DEFAULT 1 NOT NULL,
    readonly smallint DEFAULT 0 NOT NULL,
    show_title smallint DEFAULT 1 NOT NULL,
    enabled smallint DEFAULT 1 NOT NULL,
    show_creation smallint DEFAULT 0 NOT NULL,
    is_required smallint DEFAULT 0 NOT NULL,
    on_blur text DEFAULT ''::character varying NOT NULL,
    id character varying(255) DEFAULT ''::character varying NOT NULL,
    on_change character varying(255) DEFAULT ''::character varying NOT NULL,
    on_click character varying(255) DEFAULT ''::character varying NOT NULL,
    on_doubelclick character varying(255) DEFAULT ''::character varying NOT NULL,
    on_focus character varying(255) DEFAULT ''::character varying NOT NULL,
    on_keydown character varying(255) DEFAULT ''::character varying NOT NULL,
    on_keyup character varying(255) DEFAULT ''::character varying NOT NULL,
    on_keypress character varying(255) DEFAULT ''::character varying NOT NULL,
    on_mousedown character varying(255) DEFAULT ''::character varying NOT NULL,
    on_mouseup character varying(255) DEFAULT ''::character varying NOT NULL,
    on_mousemove character varying(255) DEFAULT ''::character varying NOT NULL,
    on_mouseover character varying(255) DEFAULT ''::character varying NOT NULL,
    on_mouseout character varying(255) DEFAULT ''::character varying NOT NULL,
    instructions text DEFAULT ''::text NOT NULL,
    show_instructions smallint DEFAULT 0 NOT NULL,
    checked smallint DEFAULT 0 NOT NULL,
    disabled smallint DEFAULT 0 NOT NULL,
    lang character varying(2) DEFAULT ''::character varying NOT NULL,
    align character varying(255) DEFAULT ''::character varying NOT NULL,
    accept character varying(255) DEFAULT ''::character varying NOT NULL,
    field_class character varying(255) DEFAULT ''::character varying NOT NULL,
    field_size integer DEFAULT 0 NOT NULL,
    admin_editable smallint DEFAULT 1 NOT NULL,
    previewable smallint DEFAULT 0 NOT NULL,
    is_deleted smallint DEFAULT 0 NOT NULL,
    display_name character varying(255) DEFAULT ''::character varying NOT NULL,
    app_id integer DEFAULT 0 NOT NULL,
    field_prefix character varying(255) DEFAULT ''::character varying NOT NULL,
    field_suffix character varying(255) DEFAULT ''::character varying NOT NULL,
    field_css text DEFAULT ''::text NOT NULL,
    owner_id integer DEFAULT 0 NOT NULL,
    field_unique_name character varying(255) DEFAULT ''::character varying NOT NULL,
    content_type character varying(255) DEFAULT ''::character varying NOT NULL,
    field_order integer DEFAULT 0 NOT NULL,
    PRIMARY KEY (field_id)
);";

$sqlite_installation_array[PVDatabase::getFieldsTableName()]="";

$firebird_installation_array[PVDatabase::getFieldsTableName()]="";

$mssql_installation_array[PVDatabase::getFieldsTableName()]="CREATE TABLE ".PVDatabase::getFieldsTableName()." (
    field_id INT IDENTITY (1,1) NOT NULL,
    field_name VARCHAR(255) DEFAULT '' NOT NULL,
    field_type VARCHAR(255) DEFAULT '' NOT NULL,
    field_description VARCHAR(max) DEFAULT '' NOT NULL,
    field_title VARCHAR(255) DEFAULT '' NOT NULL,
    max_length INT DEFAULT 0 NOT NULL,
    max_size INT DEFAULT 0 NOT NULL,
    field_columns INT DEFAULT 0 NOT NULL,
    field_rows INT DEFAULT 0 NOT NULL,
    field_value VARCHAR(255) DEFAULT '' NOT NULL,
    searchable TINYINT DEFAULT 1 NOT NULL,
    readonly TINYINT DEFAULT 0 NOT NULL,
    show_title TINYINT DEFAULT 1 NOT NULL,
    enabled TINYINT DEFAULT 1 NOT NULL,
    show_creation TINYINT DEFAULT 0 NOT NULL,
    is_required TINYINT DEFAULT 0 NOT NULL,
    on_blur text DEFAULT '' NOT NULL,
    id VARCHAR(255) DEFAULT '' NOT NULL,
    on_change VARCHAR(255) DEFAULT '' NOT NULL,
    on_click VARCHAR(255) DEFAULT '' NOT NULL,
    on_doubelclick VARCHAR(255) DEFAULT '' NOT NULL,
    on_focus VARCHAR(255) DEFAULT '' NOT NULL,
    on_keydown VARCHAR(255) DEFAULT '' NOT NULL,
    on_keyup VARCHAR(255) DEFAULT '',
    on_keypress VARCHAR(255) DEFAULT '' NOT NULL,
    on_mousedown VARCHAR(255) DEFAULT '' NOT NULL,
    on_mouseup VARCHAR(255) DEFAULT '' NOT NULL,
    on_mousemove VARCHAR(255) DEFAULT '' NOT NULL,
    on_mouseover VARCHAR(255) DEFAULT '' NOT NULL,
    on_mouseout VARCHAR(255) DEFAULT '' NOT NULL,
    instructions VARCHAR(max) DEFAULT '' NOT NULL,
    show_instructions TINYINT DEFAULT 0 NOT NULL,
    checked TINYINT DEFAULT 0 NOT NULL,
    disabled TINYINT DEFAULT 0 NOT NULL,
    lang VARCHAR(2) DEFAULT '' NOT NULL,
    align VARCHAR(255) DEFAULT '' NOT NULL,
    accept VARCHAR(255) DEFAULT '' NOT NULL,
    field_class VARCHAR(255) DEFAULT '' NOT NULL,
    field_size INT DEFAULT 0 NOT NULL,
    admin_editable TINYINT DEFAULT 1 NOT NULL,
    previewable TINYINT DEFAULT 0 NOT NULL,
    is_deleted TINYINT DEFAULT 0 NOT NULL,
    display_name VARCHAR(255) DEFAULT '' NOT NULL,
    app_id INT DEFAULT 0 NOT NULL,
    field_prefix VARCHAR(255) DEFAULT '' NOT NULL,
    field_suffix VARCHAR(255) DEFAULT '' NOT NULL,
    field_css text DEFAULT '' NOT NULL,
    owner_id INT DEFAULT 0 NOT NULL,
    field_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    content_type VARCHAR(255) DEFAULT '' NOT NULL,
    field_order INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (field_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Fields Options
 * --------------------------------------------------------------------------------------------------------*/

//Create PVDatabase::fields_options
$mysql_installation_array[PVDatabase::getFieldsOptionsTableName()]="CREATE TABLE ".PVDatabase::getFieldsOptionsTableName()." (
    field_id INT NOT NULL,
    option_id INT NOT NULL auto_increment,
    option_name VARCHAR(255) DEFAULT '' NOT NULL,
    option_value VARCHAR(255) DEFAULT '' NOT NULL,
    option_label VARCHAR(255) DEFAULT '' NOT NULL,
    option_selected TINYINT DEFAULT 0 NOT NULL,
    option_disabled TINYINT DEFAULT 0 NOT NULL,
    option_class VARCHAR(255) DEFAULT '' NOT NULL,
    option_dir VARCHAR(255) DEFAULT '' NOT NULL,
    option_lang VARCHAR(255) DEFAULT '' NOT NULL,
    option_style VARCHAR(255) DEFAULT '' NOT NULL,
    option_title VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_click VARCHAR(255) DEFAULT '',
    option_on_doubelclick VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_keydown VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_keyup VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_keypress VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mousedown VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mouseup VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mousemove VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mouseover VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mouseout VARCHAR(255) DEFAULT '' NOT NULL,
    option_order INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (field_id, option_id)
);";

$postgresql_installation_array[PVDatabase::getFieldsOptionsTableName()]="CREATE TABLE ".PVDatabase::getFieldsOptionsTableName()." (
    field_id integer NOT NULL,
    option_id SERIAL NOT NULL,
    option_name character varying(255) DEFAULT ''::character varying NOT NULL,
    option_value character varying(255) DEFAULT ''::character varying NOT NULL,
    option_label character varying(255) DEFAULT ''::character varying NOT NULL,
    option_selected smallint DEFAULT 0 NOT NULL,
    option_disabled smallint DEFAULT 0 NOT NULL,
    option_class character varying(255) DEFAULT ''::character varying NOT NULL,
    option_dir character varying(255) DEFAULT ''::character varying NOT NULL,
    option_lang character varying(255) DEFAULT ''::character varying NOT NULL, 
    option_style character varying(255) DEFAULT ''::character varying NOT NULL,
    option_title character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_click character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_doubelclick character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_keydown character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_keyup character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_keypress character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_mousedown character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_mouseup character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_mousemove character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_mouseover character varying(255) DEFAULT ''::character varying NOT NULL,
    option_on_mouseout character varying(255) DEFAULT ''::character varying NOT NULL,
    option_order integer DEFAULT 0 NOT NULL,
    PRIMARY KEY (field_id, option_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getFieldsOptionsTableName()]="CREATE TABLE ".PVDatabase::getFieldsOptionsTableName()." (
    field_id INT NOT NULL,
    option_id INT IDENTITY (1,1) NOT NULL,
    option_name VARCHAR(255) DEFAULT '' NOT NULL,
    option_value VARCHAR(255) DEFAULT '' NOT NULL,
    option_label VARCHAR(255) DEFAULT '' NOT NULL,
    option_selected TINYINT DEFAULT 0 NOT NULL,
    option_disabled TINYINT DEFAULT 0 NOT NULL,
    option_class VARCHAR(255) DEFAULT '' NOT NULL,
    option_dir VARCHAR(255) DEFAULT '' NOT NULL,
    option_lang VARCHAR(255) DEFAULT '' NOT NULL,
    option_style VARCHAR(255) DEFAULT '' NOT NULL,
    option_title VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_click VARCHAR(255) DEFAULT '',
    option_on_doubelclick VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_keydown VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_keyup VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_keypress VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mousedown VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mouseup VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mousemove VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mouseover VARCHAR(255) DEFAULT '' NOT NULL,
    option_on_mouseout VARCHAR(255) DEFAULT '' NOT NULL,
    option_order INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (field_id, option_id)
);";



/*-------------------------------------------------------------------------------------------------------
 * PV Fields Output
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getFieldOutputTableName()]="CREATE TABLE ".PVDatabase::getFieldOutputTableName()." (
    output_id INT NOT NULL auto_increment,
    output_type VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY(output_id)
);";

$postgresql_installation_array[PVDatabase::getFieldOutputTableName()]="CREATE TABLE ".PVDatabase::getFieldOutputTableName()." (
    output_id serial NOT NULL,
    output_type character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY(output_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getFieldOutputTableName()]="CREATE TABLE ".PVDatabase::getFieldOutputTableName()." (
    output_id INT IDENTITY (1,1) NOT NULL,
    output_type VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY(output_id)
);";


/*-------------------------------------------------------------------------------------------------------
 * PV Fields Output
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getFieldValuesTableName()]="CREATE TABLE ".PVDatabase::getFieldValuesTableName()." (
    field_value_id INT NOT NULL auto_increment,
	field_id INT NOT NULL DEFAULT 0,
    owner_id INT NOT NULL DEFAULT 0,
    app_id INT NOT NULL DEFAULT 0,
    field_value text DEFAULT '' NOT NULL ,
    content_id INT NOT NULL DEFAULT 0,
    field_grouping VARCHAR(255) DEFAULT '' NOT NULL ,
	field_date_added timestamp DEFAULT now() NOT NULL,
    PRIMARY KEY (field_value_id)
);";

$postgresql_installation_array[PVDatabase::getFieldValuesTableName()]="CREATE TABLE ".PVDatabase::getFieldValuesTableName()." (
    field_value_id serial NOT NULL,
	field_id integer NOT NULL DEFAULT 0,
    owner_id integer NOT NULL DEFAULT 0,
    app_id integer NOT NULL DEFAULT 0,
    field_value text DEFAULT ''::text NOT NULL ,
    content_id integer NOT NULL DEFAULT 0,
    field_grouping character varying(255) DEFAULT ''::character varying NOT NULL ,
	field_date_added timestamp without time zone DEFAULT now() NOT NULL,
    PRIMARY KEY (field_value_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getFieldValuesTableName()]="CREATE TABLE ".PVDatabase::getFieldValuesTableName()." (
    field_value_id INT IDENTITY (1,1) NOT NULL,
	field_id INT NOT NULL DEFAULT 0,
    owner_id INT NOT NULL DEFAULT 0,
    app_id INT NOT NULL DEFAULT 0,
    field_value varchar(max) DEFAULT '' NOT NULL ,
    content_id INT NOT NULL DEFAULT 0,
    field_grouping VARCHAR(255) DEFAULT '' NOT NULL ,
	field_date_added DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (field_value_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Fields Types
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getFieldTypesTableName()]="CREATE TABLE ".PVDatabase::getFieldTypesTableName()." (
    field_id INT NOT NULL auto_increment,
    field_type VARCHAR(255) DEFAULT '' NOT NULL,
    field_description text DEFAULT '' NOT NULL,
    field_display_name VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (field_id)
);";

$postgresql_installation_array[PVDatabase::getFieldTypesTableName()]="CREATE TABLE ".PVDatabase::getFieldTypesTableName()." (
    field_id SERIAL NOT NULL,
    field_type character varying(255) DEFAULT ''::character varying NOT NULL,
    field_description text DEFAULT ''::text NOT NULL,
    field_display_name character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (field_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getFieldTypesTableName()]="CREATE TABLE ".PVDatabase::getFieldTypesTableName()." (
    field_id INT IDENTITY (1,1) NOT NULL,
    field_type VARCHAR(255) DEFAULT '' NOT NULL,
    field_description VARCHAR(max) DEFAULT '' NOT NULL,
    field_display_name VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (field_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Field Content Relations
 * --------------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getContentFieldRelationsTableName()]="CREATE TABLE  ".PVDatabase::getContentFieldRelationsTableName()." (
			content_id INT NOT NULL,
		    field_id INT NOT NULL,
		    PRIMARY KEY(content_id, field_id )
		);";

$postgresql_installation_array[PVDatabase::getContentFieldRelationsTableName()]="CREATE TABLE  ".PVDatabase::getContentFieldRelationsTableName()." (
				content_id integer NOT NULL,
			    field_id integer NOT NULL,
			    PRIMARY KEY(content_id, field_id )
			);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentFieldRelationsTableName()]="CREATE TABLE  ".PVDatabase::getContentFieldRelationsTableName()." (
			content_id INT NOT NULL,
		    field_id INT NOT NULL,
		    PRIMARY KEY(content_id, field_id )
		);";

 /*-------------------------------------------------------------------------------------------------------
 * PV Login
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getLoginTableName()]="CREATE TABLE ".PVDatabase::getLoginTableName()." (
    user_email VARCHAR(255) UNIQUE ,
    user_password VARCHAR(255) NOT NULL,
    is_active TINYINT DEFAULT 0 NOT NULL,
    username VARCHAR(255) DEFAULT '' NOT NULL,
    receive_html_emails TINYINT DEFAULT 1 NOT NULL,
    user_id INT NOT NULL auto_increment,
	user_access_level INT NOT NULL DEFAULT 0,
    registration_date timestamp DEFAULT now() NOT NULL,
    activation_date timestamp NOT NULL,
    user_image VARCHAR(255) DEFAULT '' NOT NULL,
    user_image_thumb VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (user_id)
);";

$postgresql_installation_array[PVDatabase::getLoginTableName()]="CREATE TABLE ".PVDatabase::getLoginTableName()." (
    user_email character varying(255) UNIQUE,
    user_password character varying(255) NOT NULL,
    is_active smallint DEFAULT 0 NOT NULL,
    username character varying(255) DEFAULT ''::character varying NOT NULL,
    receive_html_emails smallint DEFAULT 1 NOT NULL,
    user_id SERIAL NOT NULL,
	user_access_level integer DEFAULT 0 NOT NULL,
    registration_date timestamp without time zone DEFAULT now() NOT NULL,
    PVDatabase::activation_date timestamp without time zone NOT NULL,
    user_image character varying(255) DEFAULT ''::character varying NOT NULL,
    user_image_thumb character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (user_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getLoginTableName()]="CREATE TABLE ".PVDatabase::getLoginTableName()." (
    user_email VARCHAR(255) UNIQUE ,
    user_password VARCHAR(255) NOT NULL,
    is_active TINYINT DEFAULT 0 NOT NULL,
    username VARCHAR(255) DEFAULT '' NOT NULL,
    receive_html_emails TINYINT DEFAULT 1 NOT NULL,
    user_id INT IDENTITY (1,1) NOT NULL,
	user_access_level INT NOT NULL DEFAULT 0,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PVDatabase::activation_date DATETIME NOT NULL,
    user_image VARCHAR(255) DEFAULT '' NOT NULL,
    user_image_thumb VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (user_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Menu Items
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getMenuItemsTableName()]="CREATE TABLE ".PVDatabase::getMenuItemsTableName()." (
    menu_id INT NOT NULL,
    item_id INT NOT NULL auto_increment,
    parent_id INT DEFAULT 0 NOT NULL,
    item_name VARCHAR(255) DEFAULT '' NOT NULL,
    item_description text DEFAULT '' NOT NULL,
    item_url VARCHAR(255) DEFAULT '' NOT NULL,
    item_params text DEFAULT '' NOT NULL,
    item_css text DEFAULT '' NOT NULL,
    item_ordering INT DEFAULT 0 NOT NULL,
    item_enabled TINYINT DEFAULT 0 NOT NULL,
    item_title VARCHAR(255) DEFAULT '' NOT NULL,
    item_permissions text DEFAULT '' NOT NULL,
    item_id_tag VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (menu_id, item_id)
);";

$postgresql_installation_array[PVDatabase::getMenuItemsTableName()]="CREATE TABLE ".PVDatabase::getMenuItemsTableName()." (
    menu_id integer NOT NULL,
    item_id SERIAL NOT NULL,
    parent_id integer DEFAULT 0 NOT NULL,
    item_name character varying(255) DEFAULT ''::character varying NOT NULL,
    item_description text DEFAULT ''::text NOT NULL,
    item_url character varying(255) DEFAULT ''::character varying NOT NULL,
    item_params text DEFAULT ''::text NOT NULL,
    item_css text DEFAULT ''::text NOT NULL,
    item_ordering integer DEFAULT 0 NOT NULL,
    item_enabled smallint DEFAULT 0 NOT NULL,
    item_title character varying(255) DEFAULT ''::character varying NOT NULL,
    item_permissions text DEFAULT ''::text NOT NULL,
    item_id_tag character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (menu_id, item_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getMenuItemsTableName()]="CREATE TABLE ".PVDatabase::getMenuItemsTableName()." (
    menu_id INT NOT NULL,
    item_id INT IDENTITY (1,1) NOT NULL,
    parent_id INT DEFAULT 0 NOT NULL,
    item_name VARCHAR(255) DEFAULT '' NOT NULL,
    item_description text DEFAULT '' NOT NULL,
    item_url VARCHAR(255) DEFAULT '' NOT NULL,
    item_params VARCHAR(max) DEFAULT '' NOT NULL,
    item_css text DEFAULT '' NOT NULL,
    item_ordering INT DEFAULT 0 NOT NULL,
    item_enabled TINYINT DEFAULT 0 NOT NULL,
    item_title VARCHAR(255) DEFAULT '' NOT NULL,
    item_permissions VARCHAR(max) DEFAULT '' NOT NULL,
    item_id_tag VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (menu_id, item_id)
);";

/*-------------------------------------------------------------------------------------------------------
* PV Module Admin
*-----------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getModuleAdminTableName()]="CREATE TABLE ".PVDatabase::getModuleAdminTableName()." (
			module_admin_id INT(11) NOT NULL AUTO_INCREMENT,
			module_name VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_unique_id VARCHAR( 255 ) NOT NULL ,
			module_app_identifier VARCHAR( 255 ) NOT NULL ,
			module_directory VARCHAR( 255 ) NOT NULL ,
			module_file VARCHAR( 255 ) NOT NULL ,
			module_function VARCHAR( 255 ) NOT NULL ,
			module_description TEXT NOT NULL DEFAULT '',
			module_author VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_license VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_site VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_version DOUBLE NOT NULL DEFAULT '0',
			is_module_editable TINYINT NOT NULL DEFAULT '0' ,
			PRIMARY KEY(module_admin_id )
);";

$postgresql_installation_array[PVDatabase::getModuleAdminTableName()]="CREATE TABLE ".PVDatabase::getModuleAdminTableName()." (
				module_admin_id SERIAL NOT NULL,
				module_name character varying( 255 ) NOT NULL DEFAULT '',
				module_unique_id character varying( 255 ) NOT NULL ,
				module_app_identifier character varying( 255 ) NOT NULL ,
				module_directory character varying( 255 ) NOT NULL DEFAULT '',
				module_file character varying( 255 ) NOT NULL DEFAULT '',
				module_function character varying( 255 ) NOT NULL DEFAULT '',
				module_description TEXT NOT NULL DEFAULT '',
				module_author character varying( 255 ) NOT NULL DEFAULT '',
				module_license character varying( 255 ) NOT NULL DEFAULT '',
				module_site character varying( 255 ) NOT NULL DEFAULT '',
				module_version double precision NOT NULL DEFAULT '0',
				is_module_editable smallint NOT NULL DEFAULT '0',
				PRIMARY KEY(module_admin_id )
				)";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getModuleAdminTableName()]="CREATE TABLE ".PVDatabase::getModuleAdminTableName()." (
			module_admin_id int IDENTITY (1,1) NOT NULL,
			module_name VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_unique_id VARCHAR( 255 ) NOT NULL ,
			module_app_identifier VARCHAR( 255 ) NOT NULL ,
			module_directory VARCHAR( 255 ) NOT NULL DEFAULT '' ,
			module_file VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_function VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_description TEXT NOT NULL DEFAULT '',
			module_author VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_license VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_site VARCHAR( 255 ) NOT NULL DEFAULT '',
			module_version float NOT NULL DEFAULT '0',
			is_module_editable TINYINT NOT NULL DEFAULT '0' ,
			PRIMARY KEY(module_admin_id )
);";
/*-------------------------------------------------------------------------------------------------------
 * PV Module Manager
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getModulesTableName()]="CREATE TABLE ".PVDatabase::getModulesTableName()." (
    module_id INT NOT NULL auto_increment,
    module_name VARCHAR(255) DEFAULT '' NOT NULL,
    module_alias VARCHAR(255) DEFAULT '' NOT NULL,
    module_description text DEFAULT '' NOT NULL,
    module_app INT DEFAULT 0 NOT NULL,
    module_ordering INT DEFAULT 0 NOT NULL, 
    module_enabled TINYINT DEFAULT 0 NOT NULL,
    module_params text DEFAULT '' NOT NULL,
    module_css text DEFAULT '' NOT NULL,
    module_title VARCHAR(255) DEFAULT '' NOT NULL,
    show_module_title TINYINT DEFAULT 0 NOT NULL,
    module_wrap TINYINT DEFAULT 0 NOT NULL,
    module_permissions text DEFAULT '' NOT NULL,
    module_identifier VARCHAR(255) DEFAULT '' NOT NULL,
    module_parent INT NOT NULL DEFAULT 0,
    module_site_id INT NOT NULL DEFAULT 0,
	module_position VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (module_id)
);";

$postgresql_installation_array[PVDatabase::getModulesTableName()]="CREATE TABLE ".PVDatabase::getModulesTableName()." (
    module_id SERIAL NOT NULL,
    module_name character varying(255) DEFAULT ''::character varying NOT NULL,
    module_alias character varying(255) DEFAULT ''::character varying NOT NULL,
    module_description text DEFAULT ''::text NOT NULL,
    module_app integer DEFAULT 0 NOT NULL,
    module_ordering integer DEFAULT 0 NOT NULL,
    module_enabled smallint DEFAULT 0 NOT NULL,
    module_params text DEFAULT ''::text NOT NULL,
    module_css text DEFAULT ''::text NOT NULL,
    module_title character varying(255) DEFAULT ''::character varying NOT NULL,
    show_module_title smallint DEFAULT 0 NOT NULL,
    module_wrap smallint DEFAULT 0 NOT NULL,
    module_permissions text DEFAULT ''::text NOT NULL,
    module_identifier character varying(255) DEFAULT '' NOT NULL,
    module_parent integer NOT NULL DEFAULT 0,
    module_site_id integer NOT NULL DEFAULT 0,
	module_position character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (module_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getModulesTableName()]="CREATE TABLE ".PVDatabase::getModulesTableName()." (
    module_id INT IDENTITY (1,1) NOT NULL,
    module_name VARCHAR(255) DEFAULT '' NOT NULL,
    module_alias VARCHAR(255) DEFAULT '' NOT NULL,
    module_description VARCHAR(max) DEFAULT '' NOT NULL,
    module_app INT DEFAULT 0 NOT NULL,
    module_ordering INT DEFAULT 0 NOT NULL, 
    module_enabled TINYINT DEFAULT 0 NOT NULL,
    module_params VARCHAR(max) DEFAULT '' NOT NULL,
    module_css text DEFAULT '' NOT NULL,
    module_title VARCHAR(255) DEFAULT '' NOT NULL,
    show_module_title TINYINT DEFAULT 0 NOT NULL,
    module_wrap TINYINT DEFAULT 0 NOT NULL,
    module_permissions VARCHAR(max) DEFAULT '' NOT NULL,
    module_identifier VARCHAR(255) DEFAULT '' NOT NULL,
    module_parent INT NOT NULL DEFAULT 0,
    module_site_id INT NOT NULL DEFAULT 0,
	module_position VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (module_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Page Containers
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getPageContainersRelationshipTableName()]="CREATE TABLE ".PVDatabase::getPageContainersRelationshipTableName()." (
    page_id INT NOT NULL,
    container_id INT NOT NULL,
    page_container_ordering INT DEFAULT 0 NOT NULL,
    page_container_enabled TINYINT DEFAULT 1 NOT NULL,
    page_container_id INT NOT NULL auto_increment,
    PRIMARY KEY (page_container_id)
);";

$postgresql_installation_array[PVDatabase::getPageContainersRelationshipTableName()]="CREATE TABLE ".PVDatabase::getPageContainersRelationshipTableName()." (
    page_id integer NOT NULL,
    container_id integer NOT NULL,
    page_container_ordering integer DEFAULT 0 NOT NULL,
    page_container_enabled smallint DEFAULT 1 NOT NULL,
    page_container_id SERIAL NOT NULL,
    PRIMARY KEY (page_container_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getPageContainersRelationshipTableName()]="CREATE TABLE ".PVDatabase::getPageContainersRelationshipTableName()." (
    page_id INT NOT NULL,
    container_id INT NOT NULL,
    page_container_ordering INT DEFAULT 0 NOT NULL,
    page_container_enabled TINYINT DEFAULT 1 NOT NULL,
    page_container_id INT IDENTITY (1,1) NOT NULL,
    PRIMARY KEY (page_container_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Page Manager
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getPagesTableName()]="CREATE TABLE ".PVDatabase::getPagesTableName()." (
    page_id INT NOT NULL auto_increment,
    page_name VARCHAR(255) DEFAULT '' NOT NULL,
    page_title VARCHAR(255) DEFAULT '' NOT NULL,
    page_description text DEFAULT '' NOT NULL,
    page_alias VARCHAR(255) DEFAULT '' NOT NULL,
    frontpage TINYINT DEFAULT 0 NOT NULL,
    page_enabled TINYINT DEFAULT 0 NOT NULL,
    page_ordering INT DEFAULT 0 NOT NULL,
    page_short_url VARCHAR(255) DEFAULT '' NOT NULL,
	page_url VARCHAR(255) DEFAULT '' NOT NULL,
    page_params text DEFAULT '' NOT NULL,
    page_permissions text DEFAULT '' NOT NULL,
    page_site_id INT NOT NULL DEFAULT 0,
    parent_page INT NOT NULL DEFAULT 0,
	page_access_level INT NOT NULL DEFAULT 0,
	page_text text DEFAULT '' NOT NULL,
    PRIMARY KEY (page_id)
);";

$postgresql_installation_array[PVDatabase::getPagesTableName()]="CREATE TABLE ".PVDatabase::getPagesTableName()." (
    page_id SERIAL NOT NULL,
    page_name character varying(255) DEFAULT ''::character varying NOT NULL,
    page_title character varying(255) DEFAULT ''::character varying NOT NULL,
    page_description text DEFAULT ''::text NOT NULL,
    page_alias character varying(255) DEFAULT ''::character varying NOT NULL,
    frontpage smallint DEFAULT 0 NOT NULL,
    page_enabled smallint DEFAULT 0 NOT NULL,
    page_ordering integer DEFAULT 0 NOT NULL,
    page_short_url character varying(255) DEFAULT ''::character varying NOT NULL,
	page_url character varying(255) DEFAULT ''::character varying NOT NULL,
    page_params text DEFAULT ''::text NOT NULL,
    page_permissions text DEFAULT ''::text NOT NULL,
    page_site_id integer NOT NULL  DEFAULT 0,
    parent_page integer NOT NULL DEFAULT 0,
	page_access_level integer NOT NULL DEFAULT 0,
	page_text text DEFAULT '',
    PRIMARY KEY (page_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getPagesTableName()]="CREATE TABLE ".PVDatabase::getPagesTableName()." (
    page_id INT IDENTITY (1,1) NOT NULL,
    page_name VARCHAR(255) DEFAULT '' NOT NULL,
    page_title VARCHAR(255) DEFAULT '' NOT NULL,
    page_description VARCHAR(max) DEFAULT '' NOT NULL,
    page_alias VARCHAR(255) DEFAULT '' NOT NULL,
    frontpage TINYINT DEFAULT 0 NOT NULL,
    page_enabled TINYINT DEFAULT 0 NOT NULL,
    page_ordering integer DEFAULT 0 NOT NULL,
    page_short_url VARCHAR(255) DEFAULT '' NOT NULL,
	page_url VARCHAR(255) DEFAULT '' NOT NULL,
    page_params text DEFAULT '' NOT NULL,
    page_permissions VARCHAR(max) DEFAULT '' NOT NULL,
    page_site_id INT NOT NULL DEFAULT 0,
    parent_page INT NOT NULL DEFAULT 0,
	page_access_level INT NOT NULL DEFAULT 0,
	page_text text DEFAULT '' NOT NULL,
    PRIMARY KEY (page_id)
);";

/**-----------------------------------------------------------------------------------------------
 * PV Plugins 
 *------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getPluginsTableName()]="CREATE TABLE ".PVDatabase::getPluginsTableName()." (
	plugin_id INT NOT NULL auto_increment,
    plugin_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_function VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_command VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_order TINYINT DEFAULT 0 NOT NULL,
    plugin_override TINYINT DEFAULT 0 NOT NULL,
    plugin_type VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_version double DEFAULT 0 NOT NULL,
    plugin_parameters text DEFAULT '' NOT NULL,
    plugin_author VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_homepage VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_license VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_name VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_file VARCHAR(255) DEFAULT '' NOT NULL,
   	plugin_uninstall_function VARCHAR(255) DEFAULT '' NOT NULL,
   	is_plugin_editable TINYINT DEFAULT 0 NOT NULL,
   	plugin_description TEXT DEFAULT '' NOT NULL,
   	plugin_preferences TEXT DEFAULT '' NOT NULL,
   	plugin_hook VARCHAR(255) DEFAULT '' NOT NULL,
   	plugin_enabled TINYINT DEFAULT 0 NOT NULL,
   	plugin_directory VARCHAR(255) DEFAULT '' NOT NULL,
   	plugin_admin_function VARCHAR(255) DEFAULT '' NOT NULL,
	plugin_application VARCHAR(255) DEFAULT '' NOT NULL,
	is_frontend_plugin TINYINT DEFAULT 0 NOT NULL,
	is_admin_plugin TINYINT DEFAULT 0 NOT NULL,
	plugin_object VARCHAR(255) DEFAULT '' NOT NULL,
	plugin_language VARCHAR(20) DEFAULT '' NOT NULL,
    PRIMARY KEY (plugin_id)
);";

$postgresql_installation_array[PVDatabase::getPluginsTableName()]="CREATE TABLE ".PVDatabase::getPluginsTableName()." (
	plugin_id SERIAL NOT NULL,
    plugin_unique_name character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_function character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_command character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_order smallint DEFAULT 0 NOT NULL,
    plugin_override smallint DEFAULT 0 NOT NULL,
    plugin_type character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_version double precision DEFAULT 0 NOT NULL,
    plugin_parameters text DEFAULT ''::character varying NOT NULL,
    plugin_author character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_homepage character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_license character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_name character varying(255) DEFAULT ''::character varying NOT NULL,
    plugin_file character varying(255) DEFAULT ''::character varying NOT NULL,
   	plugin_uninstall_function character varying(255) DEFAULT ''::character varying NOT NULL,
   	is_plugin_editable smallint DEFAULT 0 NOT NULL,
   	plugin_description text DEFAULT '' NOT NULL,
   	plugin_preferences TEXT DEFAULT '' NOT NULL,
   	plugin_hook character varying(255) DEFAULT ''::character varying NOT NULL,
   	plugin_enabled smallint DEFAULT 0 NOT NULL,
   	plugin_directory character varying(255) DEFAULT ''::character varying NOT NULL,
   	plugin_admin_function character varying(255) DEFAULT ''::character varying NOT NULL,
	plugin_application character varying(255) DEFAULT '' NOT NULL,
	is_frontend_plugin smallint DEFAULT 0 NOT NULL,
	is_admin_plugin smallint DEFAULT 0 NOT NULL,
	plugin_object character varying(255) DEFAULT '' NOT NULL,
	plugin_language character varying(20) DEFAULT '' NOT NULL,
    PRIMARY KEY (plugin_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getPluginsTableName()]="CREATE TABLE ".PVDatabase::getPluginsTableName()." (
	plugin_id INT IDENTITY (1,1) NOT NULL,
    plugin_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_function VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_command VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_order TINYINT DEFAULT 0 NOT NULL,
    plugin_override TINYINT DEFAULT 0 NOT NULL,
    plugin_type VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_version float DEFAULT 0 NOT NULL,
    plugin_parameters VARCHAR(max) DEFAULT '' NOT NULL,
    plugin_author VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_homepage VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_license VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_name VARCHAR(255) DEFAULT '' NOT NULL,
    plugin_file VARCHAR(255) DEFAULT '' NOT NULL,
   	plugin_uninstall_function VARCHAR(255) DEFAULT '' NOT NULL,
   	is_plugin_editable TINYINT DEFAULT 0 NOT NULL,
   	plugin_description VARCHAR(max) DEFAULT '' NOT NULL,
   	plugin_preferences VARCHAR(max) DEFAULT '' NOT NULL,
   	plugin_hook VARCHAR(255) DEFAULT '' NOT NULL,
   	plugin_enabled TINYINT DEFAULT 0 NOT NULL,
   	plugin_directory VARCHAR(255) DEFAULT '' NOT NULL,
   	plugin_admin_function VARCHAR(255) DEFAULT '' NOT NULL,
	plugin_application VARCHAR(255) DEFAULT '' NOT NULL,
	is_frontend_plugin TINYINT DEFAULT 0 NOT NULL,
	is_admin_plugin TINYINT DEFAULT 0 NOT NULL,
	plugin_object VARCHAR(255) DEFAULT '' NOT NULL,
	plugin_language VARCHAR(20) DEFAULT '' NOT NULL,
    PRIMARY KEY (plugin_id)
);";
 

/*-------------------------------------------------------------------------------------------------------
 * PV Session
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getSessionTableName()]="CREATE TABLE ".PVDatabase::getSessionTableName()." (
    user_id INT NOT NULL,
    session_id VARCHAR(128) DEFAULT '' NOT NULL,
    host_name VARCHAR(128) DEFAULT '' NOT NULL,
    last_activity timestamp  DEFAULT now() NOT NULL,
    session_cache VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (user_id)
);";

$postgresql_installation_array[PVDatabase::getSessionTableName()]="CREATE TABLE ".PVDatabase::getSessionTableName()." (
    user_id integer NOT NULL,
    session_id character varying(128) DEFAULT ''::character varying NOT NULL,
    host_name character varying(128) DEFAULT ''::character varying NOT NULL,
    last_activity timestamp without time zone DEFAULT now() NOT NULL,
    session_cache character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (user_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getSessionTableName()]="CREATE TABLE ".PVDatabase::getSessionTableName()." (
    user_id INT NOT NULL,
    session_id VARCHAR(128) DEFAULT '' NOT NULL,
    host_name VARCHAR(128) DEFAULT '' NOT NULL,
    last_activity DATETIME  DEFAULT CURRENT_TIMESTAMP NOT NULL,
    session_cache VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (user_id)
);";


/*-------------------------------------------------------------------------------------------------------
 * PV Session Tracker
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getSessionTrackerTableName()]="CREATE TABLE ".PVDatabase::getSessionTrackerTableName()." (
    record_id INT NOT NULL auto_increment,
    user_ip VARCHAR(255) DEFAULT '' NOT NULL,
    user_id INT DEFAULT 0 NOT NULL,
    browser_codename VARCHAR(255) DEFAULT '' NOT NULL,
    browser_name VARCHAR(255) DEFAULT '' NOT NULL,
    browser_version VARCHAR(255) DEFAULT '' NOT NULL,
    browser_cookiesenabled VARCHAR(255) DEFAULT '' NOT NULL,
    browser_platform VARCHAR(255) DEFAULT '' NOT NULL,
    browser_usernavigator VARCHAR(255) DEFAULT '' NOT NULL,
    referred_page text DEFAULT '' NOT NULL,
    browser_language VARCHAR(255) DEFAULT '' NOT NULL,
    record_timestamp timestamp DEFAULT now() NOT NULL,
    PRIMARY KEY (record_id)
);";

$postgresql_installation_array[PVDatabase::getSessionTrackerTableName()]="CREATE TABLE ".PVDatabase::getSessionTrackerTableName()." (
    record_id SERIAL NOT NULL,
    user_ip character varying(255) DEFAULT ''::character varying NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    browser_codename character varying(255) DEFAULT ''::character varying NOT NULL,
    browser_name character varying(255) DEFAULT ''::character varying NOT NULL,
    browser_version character varying(255) DEFAULT ''::character varying NOT NULL,
    browser_cookiesenabled character varying(255) DEFAULT ''::character varying NOT NULL,
    browser_platform character varying(255) DEFAULT ''::character varying NOT NULL,
    browser_usernavigator character varying(255) DEFAULT ''::character varying NOT NULL,
    referred_page text DEFAULT ''::text NOT NULL,
    browser_language character varying(255) DEFAULT ''::character varying NOT NULL,
    record_timestamp timestamp without time zone DEFAULT now() NOT NULL,
    terms_of_use text DEFAULT '' NOT NULL,
    PRIMARY KEY (record_id)
);
";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getSessionTrackerTableName()]="CREATE TABLE ".PVDatabase::getSessionTrackerTableName()." (
    record_id INT IDENTITY (1,1) NOT NULL,
    user_ip VARCHAR(255) DEFAULT '' NOT NULL,
    user_id INT DEFAULT 0 NOT NULL,
    browser_codename VARCHAR(255) DEFAULT '' NOT NULL,
    browser_name VARCHAR(255) DEFAULT '' NOT NULL,
    browser_version VARCHAR(255) DEFAULT '' NOT NULL,
    browser_cookiesenabled VARCHAR(255) DEFAULT '' NOT NULL,
    browser_platform VARCHAR(255) DEFAULT '' NOT NULL,
    browser_usernavigator VARCHAR(255) DEFAULT '' NOT NULL,
    referred_page text DEFAULT '' NOT NULL,
    browser_language VARCHAR(255) DEFAULT '' NOT NULL,
    record_timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (record_id)
);";



/*-------------------------------------------------------------------------------------------------------
 * PV Template Positions
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getTemplatePositionsTableName()]="CREATE TABLE ".PVDatabase::getTemplatePositionsTableName()." (
    template_id INT NOT NULL,
    position_name VARCHAR(255) NOT NULL DEFAULT '',
	position_width INT(11) NOT NULL DEFAULT 0,
	position_height INT(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (template_id, position_name)
);";

$postgresql_installation_array[PVDatabase::getTemplatePositionsTableName()]="CREATE TABLE ".PVDatabase::getTemplatePositionsTableName()." (
    template_id integer NOT NULL,
    position_name character varying(255) DEFAULT ''::character varying NOT NULL,
	position_width integer DEFAULT 0 NOT NULL,
	position_height integer DEFAULT 0 NOT NULL,
    PRIMARY KEY (template_id, position_name)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getTemplatePositionsTableName()]="CREATE TABLE ".PVDatabase::getTemplatePositionsTableName()." (
    template_id INT NOT NULL,
    position_name VARCHAR(255) NOT NULL DEFAULT '',
	position_width INT NOT NULL DEFAULT 0,
	position_height INT NOT NULL DEFAULT 0,
    PRIMARY KEY (template_id, position_name)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV Template 
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getTemplatesTableName()]="CREATE TABLE ".PVDatabase::getTemplatesTableName()." (
    template_id INT NOT NULL auto_increment,
    template_name VARCHAR(255) DEFAULT '' NOT NULL,
    template_version double DEFAULT 0 NOT NULL,
    template_author VARCHAR(255) DEFAULT '' NOT NULL,
    template_license VARCHAR(255) DEFAULT '' NOT NULL,
    is_default TINYINT DEFAULT 0 NOT NULL,
    main_file VARCHAR(255) DEFAULT '' NOT NULL,
    xml_file VARCHAR(255) DEFAULT '' NOT NULL,
    template_directory VARCHAR(255) DEFAULT '' NOT NULL,
    template_image VARCHAR(255) DEFAULT '' NOT NULL,
    template_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
    template_domain VARCHAR(255) DEFAULT '' NOT NULL,
    template_page INT NOT NULL DEFAULT 0,
   	template_site_id INT NOT NULL DEFAULT 0,
	template_options text NOT NULL DEFAULT '',
    PRIMARY KEY (template_id)
);";

$postgresql_installation_array[PVDatabase::getTemplatesTableName()]="CREATE TABLE ".PVDatabase::getTemplatesTableName()." (
    template_id SERIAL NOT NULL,
    template_name character varying(255) DEFAULT ''::character varying NOT NULL,
    template_version double precision DEFAULT 0 NOT NULL,
    template_author character varying(255) DEFAULT ''::character varying NOT NULL,
    template_license character varying(255) DEFAULT ''::character varying NOT NULL,
    is_default smallint DEFAULT 0 NOT NULL,
    main_file character varying(255) DEFAULT ''::character varying NOT NULL,
    xml_file character varying(255) DEFAULT ''::character varying NOT NULL,
    template_directory character varying(255) DEFAULT ''::character varying NOT NULL,
    template_image character varying(255) DEFAULT ''::character varying NOT NULL,
    template_unique_id character varying(255) DEFAULT ''::character varying NOT NULL,
    template_domain character varying(255) DEFAULT ''::character varying NOT NULL,
    template_page integer NOT NULL DEFAULT 0,
   	template_site_id integer NOT NULL DEFAULT 0,
	template_options text NOT NULL DEFAULT '',
    PRIMARY KEY (template_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getTemplatesTableName()]="CREATE TABLE ".PVDatabase::getTemplatesTableName()." (
    template_id INT IDENTITY (1,1) NOT NULL,
    template_name VARCHAR(255) DEFAULT '' NOT NULL,
    template_version float DEFAULT 0 NOT NULL,
    template_author VARCHAR(255) DEFAULT '' NOT NULL,
    template_license VARCHAR(255) DEFAULT '' NOT NULL,
    is_default TINYINT DEFAULT 0 NOT NULL,
    main_file VARCHAR(255) DEFAULT '' NOT NULL,
    xml_file VARCHAR(255) DEFAULT '' NOT NULL,
    template_directory VARCHAR(255) DEFAULT '' NOT NULL,
    template_image VARCHAR(255) DEFAULT '' NOT NULL,
    template_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
    template_domain VARCHAR(255) DEFAULT '' NOT NULL,
    template_page INT NOT NULL DEFAULT 0,
   	template_site_id INT NOT NULL DEFAULT 0,
	template_options VARCHAR(max) NOT NULL DEFAULT '',
    PRIMARY KEY (template_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV User Activation 
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getUserActivationTableName()]="CREATE TABLE ".PVDatabase::getUserActivationTableName()." (
    user_id INT NOT NULL,
    activation_code VARCHAR(255) DEFAULT '' NOT NULL,
    reset_code VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (user_id)
);";

$postgresql_installation_array[PVDatabase::getUserActivationTableName()]="CREATE TABLE ".PVDatabase::getUserActivationTableName()." (
    user_id integer NOT NULL,
    activation_code character varying(255) DEFAULT ''::character varying NOT NULL,
    reset_code character varying(255) DEFAULT ''::character varying NOT NULL,
    PRIMARY KEY (user_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getUserActivationTableName()]="CREATE TABLE ".PVDatabase::getUserActivationTableName()." (
    user_id INT NOT NULL,
    activation_code VARCHAR(255) DEFAULT '' NOT NULL,
    reset_code VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (user_id)
)";

/*-------------------------------------------------------------------------------------------------------
 * PV User Manager Application Permisions
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getApplicationPermissionsTableName()]="CREATE TABLE ".PVDatabase::getApplicationPermissionsTableName()." (
	application_permission_id INT(11) NOT NULL AUTO_INCREMENT,
    app_id INT NOT NULL,
    permission_unique_name VARCHAR(255) NOT NULL DEFAULT '',
    permission_display_name VARCHAR(255) NOT NULL DEFAULT '' ,
    permission_description text NOT NULL DEFAULT '',
    permission_roles text NOT NULL DEFAULT '',
	permission_access_level INT NOT NULL DEFAULT 0,
    PRIMARY KEY (application_permission_id)
);";

$postgresql_installation_array[PVDatabase::getApplicationPermissionsTableName()]="CREATE TABLE ".PVDatabase::getApplicationPermissionsTableName()." (
	application_permission_id SERIAL NOT NULL ,
    app_id integer NOT NULL,
    permission_unique_name character varying(255) DEFAULT ''::character varying NOT NULL,
    permission_display_name character varying(255) DEFAULT ''::character varying NOT NULL,
    permission_description text DEFAULT ''::text NOT NULL,
    permission_roles text DEFAULT ''::text NOT NULL,
	permission_access_level integer DEFAULT 0 NOT NULL,
    PRIMARY KEY (application_permission_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getApplicationPermissionsTableName()]="CREATE TABLE ".PVDatabase::getApplicationPermissionsTableName()." (
    application_permission_id INT IDENTITY (1,1) NOT NULL,
	app_id INT NOT NULL,
    permission_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    permission_display_name VARCHAR(255) DEFAULT '' NOT NULL,
    permission_description varchar(max) DEFAULT '' NOT NULL,
    permission_roles varchar(max) DEFAULT '' NOT NULL,
	permission_access_level INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (application_permission_id)
);";


/*-----------------------------------------------------------------------------------------------------
* PV Module Permissions
-----------------------------------------*/

$mysql_installation_array[PVDatabase::getModulePermissionsTableName()]="CREATE TABLE ".PVDatabase::getModulePermissionsTableName()." (
	module_permission_id INT(11) NOT NULL AUTO_INCREMENT,
    module_unique_id VARCHAR(255) NOT NULL DEFAULT '',
	app_unique_id VARCHAR(255) NOT NULL DEFAULT '',
    permission_unique_name VARCHAR(255) NOT NULL DEFAULT '',
    permission_display_name VARCHAR(255) NOT NULL DEFAULT '',
    permission_description text NOT NULL DEFAULT '',
    permission_roles text NOT NULL DEFAULT '',
	permission_access_level INT NOT NULL DEFAULT 0,
    PRIMARY KEY (module_permission_id)
);";

$postgresql_installation_array[PVDatabase::getModulePermissionsTableName()]="CREATE TABLE ".PVDatabase::getModulePermissionsTableName()." (
	module_permission_id SERIAL NOT NULL ,																								
    module_unique_id character varying(255) NOT NULL DEFAULT ''::character varying,
	app_unique_id character varying(255) NOT NULL DEFAULT ''::character varying,
    permission_unique_name character varying(255) NOT NULL DEFAULT ''::character varying,
    permission_display_name character varying(255) NOT NULL DEFAULT ''::character varying,
    permission_description text NOT NULL DEFAULT ''::text,
    permission_roles text NOT NULL DEFAULT ''::text,
	permission_access_level integer NOT NULL DEFAULT 0,
    PRIMARY KEY (module_permission_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getModulePermissionsTableName()]="CREATE TABLE ".PVDatabase::getModulePermissionsTableName()." (
	module_permission_id INT IDENTITY (1,1) NOT NULL,
    module_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
	app_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
    permission_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    permission_display_name VARCHAR(255) DEFAULT '' NOT NULL,
    permission_description varchar(max) DEFAULT '' NOT NULL,
    permission_roles varchar(max) DEFAULT '' NOT NULL,
	permission_access_level INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (module_permission_id)
);";


/*-----------------------------------------------------------------------------------------------------
* PV Plugin-in Permissions
-----------------------------------------*/

$mysql_installation_array[PVDatabase::getPluginPermissionsTableName()]="CREATE TABLE ".PVDatabase::getPluginPermissionsTableName()." (
    plugin_permission_id INT(11) NOT NULL AUTO_INCREMENT,
	plugin_unique_id VARCHAR(255) NOT NULL DEFAULT '',
    permission_unique_name VARCHAR(255) NOT NULL DEFAULT '',
    permission_display_name VARCHAR(255) NOT NULL DEFAULT '',
    permission_description text NOT NULL DEFAULT '',
    permission_roles text NOT NULL DEFAULT '',
	permission_access_level INT NOT NULL DEFAULT 0,
    PRIMARY KEY (plugin_permission_id)
);";

$postgresql_installation_array[PVDatabase::getPluginPermissionsTableName()]="CREATE TABLE ".PVDatabase::getPluginPermissionsTableName()." (
	plugin_permission_id SERIAL NOT NULL ,
    plugin_unique_id character varying(255) NOT NULL DEFAULT ''::character varying,
    permission_unique_name character varying(255) NOT NULL DEFAULT ''::character varying,
    permission_display_name character varying(255) NOT NULL DEFAULT ''::character varying,
    permission_description text NOT NULL DEFAULT ''::text,
    permission_roles text NOT NULL DEFAULT ''::text,
	permission_access_level integer NOT NULL DEFAULT 0,
    PRIMARY KEY (plugin_permission_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getPluginPermissionsTableName()]="CREATE TABLE ".PVDatabase::getPluginPermissionsTableName()." (
	plugin_permission_id INT IDENTITY (1,1) NOT NULL,
    plugin_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
    permission_unique_name VARCHAR(255) DEFAULT '' NOT NULL,
    permission_display_name VARCHAR(255) DEFAULT '' NOT NULL,
    permission_description varchar(max) DEFAULT '' NOT NULL,
    permission_roles varchar(max) DEFAULT '' NOT NULL,
	permission_access_level INT DEFAULT 0 NOT NULL,
    PRIMARY KEY (plugin_permission_id)
);";


/*-------------------------------------------------------------------------------------------------------
 * PV Access Levels
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getAccessLevelsTableName()]="CREATE TABLE ".PVDatabase::getAccessLevelsTableName()." (
		access_level_id INT NOT NULL AUTO_INCREMENT ,
		access_level_name VARCHAR( 255 ) NOT NULL DEFAULT '',
		access_level INT NOT NULL DEFAULT 0 ,
		PRIMARY KEY ( access_level_id )
);";

$postgresql_installation_array[PVDatabase::getAccessLevelsTableName()]="CREATE TABLE ".PVDatabase::getAccessLevelsTableName()." (
		access_level_id SERIAL NOT NULL ,
		access_level_name character varying( 255 ) NOT NULL DEFAULT '',
		access_level integer NOT NULL DEFAULT 0 ,
		PRIMARY KEY ( access_level_id )
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getAccessLevelsTableName()]="CREATE TABLE ".PVDatabase::getAccessLevelsTableName()." (
		access_level_id INT IDENTITY (1,1) NOT NULL,
		access_level_name VARCHAR( 255 ) NOT NULL DEFAULT '',
		access_level INT NOT NULL DEFAULT 0 ,
		PRIMARY KEY ( access_level_id )
);";

/*-------------------------------------------------------------------------------------------------------
 * PV User Roles
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getUserRolesTableName()]="CREATE TABLE ".PVDatabase::getUserRolesTableName()." (
    role_id INT NOT NULL auto_increment,
    role_name VARCHAR(255) DEFAULT '' NOT NULL,
    role_description text DEFAULT '' NOT NULL,
    role_type VARCHAR(255) DEFAULT '' NOT NULL,
    is_editable TINYINT DEFAULT 0 NOT NULL,
    PRIMARY KEY (role_id)
);";

$postgresql_installation_array[PVDatabase::getUserRolesTableName()]="CREATE TABLE ".PVDatabase::getUserRolesTableName()." (
    role_id serial NOT NULL,
    role_name character varying(255) DEFAULT ''::character varying NOT NULL,
    role_description text DEFAULT ''::text NOT NULL,
    role_type character varying(255) DEFAULT ''::character varying NOT NULL,
    is_editable smallint DEFAULT 0 NOT NULL,
    PRIMARY KEY (role_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getUserRolesTableName()]="CREATE TABLE ".PVDatabase::getUserRolesTableName()." (
    role_id INT IDENTITY (1,1) NOT NULL,
    role_name VARCHAR(255) DEFAULT '' NOT NULL,
    role_description VARCHAR(max) DEFAULT '' NOT NULL,
    role_type VARCHAR(255) DEFAULT '' NOT NULL,
    is_editable TINYINT DEFAULT 0 NOT NULL,
    PRIMARY KEY (role_id)
);";

/*-------------------------------------------------------------------------------------------------------
 * PV User Roles Relations
 * --------------------------------------------------------------------------------------------------------*/

$mysql_installation_array[PVDatabase::getUserRolesRelationsTableName()]="CREATE TABLE ".PVDatabase::getUserRolesRelationsTableName()." (
    role_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (role_id, user_id)
);";

$postgresql_installation_array[PVDatabase::getUserRolesRelationsTableName()]="CREATE TABLE ".PVDatabase::getUserRolesRelationsTableName()." (
    role_id integer NOT NULL,
    user_id integer NOT NULL,
    PRIMARY KEY (role_id, user_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getUserRolesRelationsTableName()]="CREATE TABLE ".PVDatabase::getUserRolesRelationsTableName()." (
    role_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (role_id, user_id)
);";


/*-------------------------------------------------------------------------------------------------------
 * PV Multi Author
 * --------------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getContentMultiAuthorTableName()]="CREATE TABLE ".PVDatabase::getContentMultiAuthorTableName()." (
	content_id INT NOT NULL,
	author_id INT NOT NULL,
	author_status VARCHAR(255) DEFAULT '' NOT NULL,
	owner_added_date timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
	PRIMARY KEY(content_id, author_id)
	);";

$postgresql_installation_array[PVDatabase::getContentMultiAuthorTableName()]="CREATE TABLE ".PVDatabase::getContentMultiAuthorTableName()." (
	content_id integer NOT NULL,
	author_id integer NOT NULL,
	author_status character varying(255) DEFAULT '' NOT NULL,
	owner_added_date timestamp DEFAULT now() NOT NULL,
	PRIMARY KEY(content_id, author_id)
	);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getContentMultiAuthorTableName()]="CREATE TABLE ".PVDatabase::getContentMultiAuthorTableName()." (
	content_id INT NOT NULL,
	author_id INT NOT NULL,
	author_status VARCHAR(255) DEFAULT '' NOT NULL,
	owner_added_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	PRIMARY KEY(content_id, author_id )
	);";


/*-------------------------------------------------------------------------------------------------------
 * PV MVC
 * --------------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getMVCTableName()]="CREATE TABLE ".PVDatabase::getMVCTableName()." (
	mvc_unique_id VARCHAR(255) NOT NULL,
	mvc_name VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_description text DEFAULT '' NOT NULL,
	mvc_author VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_website VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_license text DEFAULT '' NOT NULL,
	mvc_version double DEFAULT 0 NOT NULL,
	mvc_directory VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_file VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_object VARCHAR(255) DEFAULT '' NOT NULL,
	is_current_mvc TINYINT DEFAULT 0 NOT NULL,
	autoload_mvc TINYINT DEFAULT 0 NOT NULL,
	PRIMARY KEY(mvc_unique_id)
);";

$postgresql_installation_array[PVDatabase::getMVCTableName()]="CREATE TABLE ".PVDatabase::getMVCTableName()." (
	mvc_unique_id character varying(255) NOT NULL,
	mvc_name character varying(255) DEFAULT '' NOT NULL,
	mvc_description text DEFAULT '' NOT NULL,
	mvc_author character varying(255) DEFAULT '' NOT NULL,
	mvc_website character varying(255) DEFAULT '' NOT NULL,
	mvc_license text DEFAULT '' NOT NULL,
	mvc_version double precision DEFAULT 0 NOT NULL,
	mvc_directory character varying(255) DEFAULT '' NOT NULL,
	mvc_file character varying(255) DEFAULT '' NOT NULL,
	mvc_object character varying(255) DEFAULT '' NOT NULL,
	is_current_mvc smallint DEFAULT 0 NOT NULL,
	autoload_mvc smallint DEFAULT 0 NOT NULL,
	PRIMARY KEY(mvc_unique_id)
);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getMVCTableName()]="CREATE TABLE ".PVDatabase::getMVCTableName()." (
	mvc_unique_id VARCHAR(255) NOT NULL,
	mvc_name VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_description VARCHAR(max) DEFAULT '' NOT NULL,
	mvc_author VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_website VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_license VARCHAR(max) DEFAULT '' NOT NULL,
	mvc_version float DEFAULT 0 NOT NULL,
	mvc_directory VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_file VARCHAR(255) DEFAULT '' NOT NULL,
	mvc_object VARCHAR(255) DEFAULT '' NOT NULL,
	is_current_mvc TINYINT DEFAULT 0 NOT NULL,
	autoload_mvc TINYINT DEFAULT 0 NOT NULL,
	PRIMARY KEY(mvc_unique_id)
);";


/*-------------------------------------------------------------------------------------------------------
 * PV Menu
 * --------------------------------------------------------------------------------------------------------*/
 
$mysql_installation_array[PVDatabase::getMenuTableName()]="CREATE TABLE ".PVDatabase::getMenuTableName()." (
	menu_id INT auto_increment NOT NULL,
	menu_name VARCHAR(255) DEFAULT '' NOT NULL,
	menu_description text DEFAULT '' NOT NULL,
	menu_type VARCHAR(255) DEFAULT '' NOT NULL,
	menu_tag_id VARCHAR(255) DEFAULT '' NOT NULL,
	menu_css VARCHAR(255) DEFAULT '' NOT NULL,
	menu_order INT(11) DEFAULT 0 NOT NULL,
	app_id INT(11) DEFAULT 0 NOT NULL,
	content_id INT(11) DEFAULT 0 NOT NULL,
	user_id INT(11) DEFAULT 0 NOT NULL,
	menu_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
	menu_class VARCHAR(255) DEFAULT '' NOT NULL,
	menu_enabled TINYINT DEFAULT 0 NOT NULL,
	PRIMARY KEY(menu_id)
	);";

$postgresql_installation_array[PVDatabase::getMenuTableName()]="CREATE TABLE ".PVDatabase::getMenuTableName()." (
	menu_id SERIAL NOT NULL,
	menu_name character varying(255) DEFAULT '' NOT NULL,
	menu_description text DEFAULT '' NOT NULL,
	menu_type character varying(255) DEFAULT '' NOT NULL,
	menu_tag_id character varying(255) DEFAULT '' NOT NULL,
	menu_css character varying(255) DEFAULT '' NOT NULL,
	menu_order integer DEFAULT 0 NOT NULL,
	app_id integer DEFAULT 0 NOT NULL,
	content_id integer DEFAULT 0 NOT NULL,
	user_id integer DEFAULT 0 NOT NULL,
	menu_unique_id character varying(255) DEFAULT '' NOT NULL,
	menu_class character varying(255) DEFAULT '' NOT NULL,
	menu_enabled smallint DEFAULT 0 NOT NULL,
	PRIMARY KEY(menu_id)
	);";

$sqlite_installation_array['']="";

$firebird_installation_array['']="";

$mssql_installation_array[PVDatabase::getMenuTableName()]="CREATE TABLE ".PVDatabase::getMenuTableName()." (
	menu_id INT IDENTITY (1,1) NOT NULL,
	menu_name VARCHAR(255) DEFAULT '' NOT NULL,
	menu_description VARCHAR(max) DEFAULT '' NOT NULL,
	menu_type VARCHAR(255) DEFAULT '' NOT NULL,
	menu_tag_id VARCHAR(255) DEFAULT '' NOT NULL,
	menu_css VARCHAR(255) DEFAULT '' NOT NULL,
	menu_order INT DEFAULT 0 NOT NULL,
	app_id INT DEFAULT 0 NOT NULL,
	content_id INT DEFAULT 0 NOT NULL,
	user_id INT DEFAULT 0 NOT NULL,
	menu_unique_id VARCHAR(255) DEFAULT '' NOT NULL,
	menu_class VARCHAR(255) DEFAULT '' NOT NULL,
	menu_enabled TINYINT DEFAULT 0 NOT NULL,
	PRIMARY KEY(menu_id)
	);";


?>