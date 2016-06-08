<?php
@session_start();
//error_reporting("Error");



	//**************** include classes *************************
	require_once("global.config.php");
	require_once("database.inc.php");
	require_once("class.Authentication.php");
	require_once("class.FormValidation.php");
	require_once("ClsJSFormValidation.cls.php");	
	
	
   define("DATABASE_HOST","localhost",true);
	define("DATABASE_PORT","3306",true);
	define("DATABASE_USER","root",true);
	define("DATABASE_PASSWORD","",true);
	define("DATABASE_NAME","its_portal",true);
	
	
?>