<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
session_start();
require_once('config.php');

if (isset($_POST)) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $description = $_POST['appointment_description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    // $resolved = $_POST['resolved'];
    $sql = "UPDATE appointments SET name=:name, email=:email, address=:address, phoneNum=:phoneNum, description=:description, date=:date, time=:time, resolved=:resolved WHERE id=:id";
    // $sql = "UPDATE `appointments` SET (name, email, phoneNum, address, date, time,description) VALUES (?, ?, ?, ?, ?, ?, ?) WHERE id = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phoneNum', $phoneNum);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    if (isset($_POST['resolved'])) {
        $resolved = 1;
    } else {
        $resolved = 0;
    }
    $stmt->bindParam(':resolved', $resolved);

    $result = $stmt->execute();

    if ($result) {
        header("Location: viewAppointments.php");
    } else {
        echo "Error:" . $sql . "<br>";
    }

} else {
    echo "didnt work";
}

?>