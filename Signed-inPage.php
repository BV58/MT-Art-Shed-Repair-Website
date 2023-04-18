<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
	header("Location: login.php");
	exit();
}

// Connect to the database
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user's name from the database
$username = $_SESSION["username"];
$sql = "SELECT name FROM customers WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$name = $row["name"];
} else {
	$name = "Unknown";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signed In</title>
</head>
<body>
	<h1>Welcome, <?php echo $name; ?>!</h1>
</body>
</html>