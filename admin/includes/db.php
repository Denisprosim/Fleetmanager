<?php
// Setup for DB connection
$host = "";
$username = "";
$password = "";
$db_name = "";
$connection = mysqli_connect($host, $username, $password, $db_name);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}