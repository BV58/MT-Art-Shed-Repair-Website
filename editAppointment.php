<?php
// Connect to MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve appointment information
$id = $_GET["id"];
$sql = "SELECT * FROM appointments WHERE id=$id";
$result = $conn->query($sql);
$appointment = $result->fetch_assoc();

// Update appointment in database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST["date"];
  $time = $_POST["time"];
  $description = $_POST["description"];

  $sql = "UPDATE appointments SET date='$date', time='$time', description='$description' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    header("Location: viewAppointmentswithEdit.php");
    exit;
  } else {
    echo "Error updating appointment: " . $conn->error;
  }
}

$conn->close();
?>

<h1>Edit Appointment</h1>
<form method="POST">
  <label for="date">Date:</label>
  <input type="date" id="date" name="date" value="<?php echo $appointment['date']; ?>">
  <br>
  <label for="time">Time:</label>
  <input type="time" id="time" name="time" value="<?php echo $appointment['time']; ?>">
 
