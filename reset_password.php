<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$pass = 'password';
$dbname = 'login';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
	die('Connection failed: ' . $conn->connect_error);
}
?>

<?php
// Check if the email exists in the database
$email = $_POST['email'];
$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
	// Email address not found, show error message
	echo 'Invalid email address';
	exit;
}
?>

<?php
// Get the new password and confirmation password
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if ($password != $confirm_password) {
	// Passwords don't match, show error message
	echo 'Passwords do not match';
	exit;
}
?>

<?php
// Hash the new password
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Update the user's password in the database
$stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
$stmt->bind_param('ss', $password, $email);
$stmt->execute();
?>

<?php
// Display a confirmation message
echo 'Password reset successful';
?>
