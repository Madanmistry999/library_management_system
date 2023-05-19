<?php
	$server="localhost";
	$usrname="root";
	$password="";
	$database="library_db";
	$con =mysqli_connect($server,$usrname,$password,$database);
	
	if(!$con){
		echo "Connection failed".mysqli_error();
	}
?>