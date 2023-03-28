<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Check if user is logged in and name is set
if (!isset($_SESSION['userlogin']) || !isset($_SESSION['name'])) {
        header('Location: login.php');
        exit();
}
if (isset($_SESSION['userlogin'])){

$name = $_SESSION['name'];
include "config.php";

$sql = "SELECT * FROM users WHERE name = '$name'";

$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <nav>
        <div>
            <h1>MT ART SHED</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
    	
    
        <h2>Hello, <?php echo $row['name'];?></h2>

        <div>
            <p>Your account details are below:</p>
            <table>
                      	
                <tr>
                    <td>Name:</td>
                    <td><?php echo $row['name'];?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?php echo $row['password'];?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $row['email'];?></td>
                </tr>
                <tr>
                	<td>Address:</td>
                	<td><?php echo $row['address'];?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo $row['phoneNumber'];?></td>
                </tr>
            </table>
        </div>
    </div>
    

<div>
	<button onclick= ""> Appointments</button>

	
	<button onclick= "location.href='update_account.php'"> Edit Account</button>
</div>

</body>
</html>



<?php

}else{

	header("location: login.php");
 
 	exit();
}

?>