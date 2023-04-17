<?php
	global $conn;

	$servername = $_POST['servername'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dbname = $_POST['dbname'];

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	// Redirect to the viewpage
	header('Location: http://localhost/SqlBPweb/HTML/view.html');
	
?>
