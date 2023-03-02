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

// Validate user's account information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // User is authenticated, retrieve their appointments
    $account = $result->fetch_assoc();
    $account_id = $account["id"];

    $sql = "SELECT * FROM appointments WHERE account_id=$account_id";
    $result = $conn->query($sql);

    // Display appointments on HTML table
    echo "<h1>Appointments for ".$account["name"]."</h1>";
    echo "<table>";
    echo "<tr><th>Date</th><th>Time</th><th>Location</th></tr>shedType</th><th>shedColor</th><th>AdditionalRequirements";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["location"]."</td></tr>".$row["shedType"]."</td></tr>".$row["shedColor"]"</td></tr>".$row["additionalRequirements"];
    }
    echo "</table>";
  } else {
    echo "Invalid username or password";
  }
}

$conn->close();
?>
