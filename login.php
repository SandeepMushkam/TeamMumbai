<?php
// Start the session
session_start();

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "safetravel";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Retrieve the values from the form
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Query the database for the user
	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) == 1) {
		// If the user is found, start the session and redirect to the home page
		$_SESSION['username'] = $username;
		header('Location: user.html');
		exit;
	} else {
		// If the user is not found, display an error message
		$error = "Invalid username or password.";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required><br>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required><br>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>
