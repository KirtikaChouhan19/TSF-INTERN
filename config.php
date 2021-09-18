<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nano_bank";

	$con = mysqli_connect($servername, $username, $password, $dbname);

	if(!$con){
		die("Error in Connecting with Database...".mysqli_connect_error());
	}

?>