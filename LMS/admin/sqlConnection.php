<?php
	$dbusername = "apoorv";
	$dbpassword = "Ubuntu@123456";
	$dbname = "lms_1";
	$dbserver = "localhost";
	$conn2 = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);

	if($conn2->connect_error){
	    die("Connection failed: ".$conn2->connect_error);
	}
?>
