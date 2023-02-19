<?php
// Get form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Check if passwords match
if ($password !== $repassword) {
	echo "Passwords do not match.";
	exit;
}

// Connect to database
require_once('connection.php');

// Insert data into table
$sql = "INSERT INTO users (fname, lname, username, password, isvalid) VALUES ('$fname', '$lname', '$username', '$password',1)";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully.";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
