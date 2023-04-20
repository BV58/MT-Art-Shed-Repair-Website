<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
session_start();
require_once('config.php');

if (isset($_POST)) {

  $name = $_POST['name'];
  $phoneNum = $_POST['phoneNum'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $description = $_POST['appointment_description'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  $sql = "INSERT INTO appointments (name, email, phoneNum, address, date, time,description) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$name, $email, $phoneNum, $address, $date, $time, $description]);

  if ($result) {

    header("Location: viewAppointments.php");


  } else {
    echo "Error:" . $sql . "<br>";
  }

} else {
  echo "didnt work";
}

?>