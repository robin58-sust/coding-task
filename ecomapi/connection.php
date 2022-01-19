<?php
	/*header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');  
	
	// Report all errors except for notices
	error_reporting(E_ALL ^ E_NOTICE);*/

	include 'config.php';

	// Create connection
	$conn = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";
	mysqli_set_charset($conn,"utf8");

?>