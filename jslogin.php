<?php
session_start();
require_once('config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
$stmselect = $db->prepare($sql);
$result = $stmselect->execute([$username, $password]);
$_SESSION['email'] = "";
if ($result) {
    $user = $stmselect->fetch(PDO::FETCH_ASSOC);
    if ($stmselect->rowCount() > 0) {
        $_SESSION['userlogin'] = $user;
        $_SESSION['email'] = $username;
        echo '1';
    } else {
        echo 'fail';
    }
} else {
    echo "there were errors while connecting to db.";
}