<?php

	session_start();
	$dbHost = "localhost";
	$dbName = "blog";
	$dbUser = "root";
	$dbUserpassword  = "";

	$db = null;

	try
	{

		$db = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbUserpassword, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
	catch(PDOexception $e){
		echo "Connection failed: " . $e->getMessage();
	}

	return $db;
		

?>