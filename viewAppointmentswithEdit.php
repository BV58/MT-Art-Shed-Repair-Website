<?php
// Connect to MySQL database
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Retrieve user's appointments
// $sql = "SELECT * FROM appointments WHERE account_id=$account_id";
// $result = $conn->query($sql);

// // Display appointments on HTML table
// echo "<h1>Appointments for ".$account["name"]."</h1>";
// echo "<table>";
// echo "<tr><th>Date</th><th>Time</th><th>Description</th><th>Actions</th></tr>";
// while($row = $result->fetch_assoc()) {
//   echo "<tr>";
//   echo "<td>".$row["date"]."</td>";
//   echo "<td>".$row["time"]."</td>";
//   echo "<td>".$row["shedType"]."</td>"
//   echo "<td>".$row["shedColor"]."</td>"
//   echo "<td>".$row["additionalRequirements"]."</td>";
//   echo "<td><a href='edit_appointment.php?id=".$row["id"]."'>Edit</a></td>";
//   echo "</tr>";
// }
// echo "</table>";

// $conn->close();
?>