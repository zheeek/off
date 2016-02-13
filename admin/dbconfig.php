<?php

	$db_host = "localhost";
	$db_name = "off";
	$db_user = "root";
	$db_pass = "";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		session_start();
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}


?>