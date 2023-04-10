<?php
// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "appointments");

// Check for errors
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the appointment details from the form
$date = $_POST["date"];
$time = $_POST["time"];
$location = $_POST["location"];
$shedType = $_POST["shedType"];
$shedColor = $_POST["shedColor"];
$additionalRequirements = $_POST['additionalRequirements'];

// Insert the new appointment into the database
$sql = "INSERT INTO appointments (date, time, location, shedType, shedColor, additionalRequirements) VALUES ('$date', '$time', '$location', '$shedType', '$shedColor, $additionalRequirements)";
if (mysqli_query($conn, $sql)) {
  echo "Appointment created successfully!";
} else {
  echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
