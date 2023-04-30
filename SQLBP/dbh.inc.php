<?php 
// Database Handler
// Connect to the database
$dbservername = "192.168.1.69";   // replace with your XAMPP server IP address
$dbusername = "SQLBP_ADMIN";      // replace with your database username
$dbpassword = "pass123";          // replace with your database password
$dbname = "sqlbp_users";          // replace with your database name

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>