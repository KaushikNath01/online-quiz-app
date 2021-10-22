<?php
	$dbhost	= "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "eduaid_quiz_app";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$connection){
		die("Could not connect to database");
	}
	
?>