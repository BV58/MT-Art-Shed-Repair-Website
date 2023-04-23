<?php
require_once('config.php');
?>
<?php

if (isset($_POST)) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, email, phone_number, address, password ) VALUES (:name,:email,:phonenumber,:address,:password)";
    $stmtinsert = $db->prepare($sql);
    $stmtinsert = $db->prepare($sql);
    $stmtinsert->bindParam(':name', $name);
    $stmtinsert->bindParam(':email', $email);
    $stmtinsert->bindParam(':phonenumber', $phone_number);
    $stmtinsert->bindParam(':address', $address);
    $stmtinsert->bindParam(':password', $password);
    $result = $stmtinsert->execute();
    if ($result) {
        echo 'Successfully saved.';
    } else {
        echo 'There were erros while saving the data.';
    }
} else {
    echo 'No data';
}