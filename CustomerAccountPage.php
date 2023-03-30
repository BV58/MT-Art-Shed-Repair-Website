<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Check if user is logged in and name is set
if (!isset($_SESSION['userlogin'])){ //|| !isset($_SESSION['name'])) {
        header('Location: login.php');
        exit();

} 
//if (isset($_SESSION['userlogin'])){

$name = $_SESSION['userlogin'];
include "config.php";

$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
if (!$stmt->execute()){
    // handle the error here, e.g. log it or display an error message
    die("Error executing query: " . $stmt->errorInfo()[2]);
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$array = $_SESSION['userlogin'];






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
    	
    
        <h2>Hello, <?php echo is_array($array) && isset($array['name']) ? $array['name'] : '';?></h2>
</h2>

        <div>
            <p>Your account details are below:</p>
            <table>
                      	
                <tr>
                    <td>Name:</td>
                    <td><?php echo is_array($array) && isset($array['name']) ? $array['name'] : '';?></td>

                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?php echo is_array($array) && isset($array['password']) ? $array['password'] : '';?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo is_array($array) && isset($array['email']) ? $array['email'] : '';?></td>
                </tr>
                <tr>
                	<td>Address:</td>
                	<td><?php echo is_array($array) && isset($array['address']) ? $array['address'] : '';?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo is_array($array) && isset($array['phone_number']) ? $array['phone_number'] : '';?></td>
                </tr>
            </table>
        </div>
    </div>
    

<div>
	<button onclick= "location.href='appointments.php'"> Appointments</button>

	
	<button onclick= "location.href='update_account.php'"> Edit Account</button>
</div>

</body>
</html>



