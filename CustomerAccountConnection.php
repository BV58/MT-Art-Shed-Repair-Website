<?php
// Connect to the database
$conn = mysqli_connect("localhost", "name", "password", "users");

// Check for errors
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the user's account name
$name = "example_user";
$sql = "SELECT account_name FROM users WHERE name='$name'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// Display the user's account name
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Welcome, " . $row["account_name"] . "!";
} else {
  echo "User not found.";
}

// Close the database connection
mysqli_close($conn);
?>
