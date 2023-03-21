<?php
// Connect to database
$host = "localhost";
$username = "root";
$password = "password";
$database = "login";
$conn = mysqli_connect($host, $username, $password, $database);

// Get user ID from session or URL parameter
$user_id = $_SESSION['id']; // or $_GET['id']

// Get user data from database
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Update user data in database
  $query = "UPDATE users SET name = '$name', email = '$email'";
  if (!empty($password)) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query .= ", password = '$hash'";
  }
  $query .= " WHERE id = $user_id";
  mysqli_query($conn, $query);

  // Redirect user back to their account page
  header("Location: account.php");
  exit();
}
?>
