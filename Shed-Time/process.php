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

    $sql = "INSERT INTO users (name, email, phone_number, password ) VALUES(?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$name, $email, $phone_number, $password]);
    if ($result) {
        echo 'Successfully saved.';
    } else {
        echo 'There were erros while saving the data.';
    }
} else {
    echo 'No data';
}