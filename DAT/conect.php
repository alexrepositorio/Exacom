<?php
	include("DAT/config.php");
	if(!($link=mysqli_connect($db_host,$db_user,$db_pass,$db_name))){
		echo "Error:".mysql_error();
		exit();
	}	
	$link->query("SET NAMES 'utf8'");
?>