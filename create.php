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

    $sql = "INSERT INTO appointments (name, email, phoneNum, address, dateAndTime, description) VALUES ($name, $email, $phoneNum, $address, $date, $description)";
    $result = $db->exec($sql);

    if ($result) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }else{
    echo "didnt work";
  }

?>