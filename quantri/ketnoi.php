<?php  
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="lsond2001";
	$dbname="greenwichphoneshop";

	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if($conn){
		$setLang=mysqli_query($conn, "SET NAMES 'utf8'");
	}
	else{
		die("Connection failed!".mysqli_connect_error());
	}
?>