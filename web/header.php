<?php
$servername = "mysql";
$username = "x4ry";
$password = "DSAFcxvzd7673rds";
$dbname = "x4ry";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
		
	