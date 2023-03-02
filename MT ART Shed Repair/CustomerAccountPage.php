<?php

session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: CustomerAccountPage.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: login.php");
}

?>

<p>Welcome to index</p>


<a href="CustomerAccountPage.php?logout=true">Logout</a>