<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Check if user is logged in and name is set
if (!isset($_SESSION['userlogin'])) {
    header('Location: login.php');
    exit();
}

$array = $_SESSION['userlogin'];
include "config.php";

$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
if (!$stmt->execute()) {
    // handle the error here, e.g. log it or display an error message
    die("Error executing query: " . $stmt->errorInfo()[2]);
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//echo var_dump($array)

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="ProfilePage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body class="userlogin">
    <nav class="navtop">
        <div>
            <h1>MT ART SHED</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <h1>Hello,
            <?php echo $array['name']; ?>
        </h1>
    </div>
    </nav>
    <div class="content">
        <h2>Account Page</h2>
        <div>
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>
                        <?php echo $array['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php echo $array['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <?php echo $array['address']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <?php echo $array['phone_number']; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="text-center">
        <a href="viewAppointments.php" class="btn btn-success pull-center"><i class="fa"></i> View or Create
            Appointment</a>
        <!-- <button onclick="location.href='viewAppointments.php'"> Appointments</button> -->
        <!-- <button onclick="location.href='update_account.php'"> Edit Account</button> -->
    </div>
    <div class="text-center">
        <button onclick="location.href='update_account.php'"> Edit Account</button>
    </div>
</body>

</html>