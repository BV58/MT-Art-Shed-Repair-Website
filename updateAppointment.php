<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
session_start();
require_once('config.php');

$id = trim($_GET["id"]);
echo $id;
$sql = "SELECT * FROM appointments WHERE id = '$id'";
$result = $db->query($sql);

if ($result) {
    $row = $result->fetch();
    $name = $row['name'];
    $email = $row['email'];
    $phoneNum = $row['phoneNum'];
    $address = $row['address'];
    $date = $row['date'];
    $time = $row['time'];
    $description = $row['description'];
    $resolved = $row['resolved'];
    //header("Location: viewAppointments.php");


} else {
    echo "Error:" . $sql . "<br>";
}



?>
<html lang="en">

<head>
    <title>Create Appointment.</title>
    <link rel="stylesheet" type="text/css" href="appointment.css" />
    <link rel="icon" type="image/x-icon" href="\images\favicon.ico">
</head>

<body>


    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1><span>MT ART</span> SHED REPAIR</h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="sidebar">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="index.html" data-after="Home">Home</a></li>
                        <li><a href="index.html#services" data-after="Service">Services</a></li>
                        <li><a href="index.html#about" data-after="About">About</a></li>
                        <li><a href="index.html#contact" data-after="Contact">Contact</a></li>
                        <li><a href="#login" data-after="LOG IN">Log In</a></li>
                        <li><a href="#FAQ" data-after="FAQ">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF NAVI HEADER -->





    <!-- APPOINTMENT FORM SECTION -->

    <section id="form">
        <div class="form container">
            <div>
                <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create
                    your appointment!</h1>
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our team members will visit you
                    for a free estimate!</h2>
            </div>
            <form action="update.php" method="POST">

                <fieldset>

                    <legend>Personal information:</legend>

                    Full name:<br>
                    <input type="hidden" name="id" value="<?= $id; ?>" />
                    <input type="text" name="name" id="name" value="<?php echo $name; ?>">

                    <br>

                    Phone Number:<br>

                    <input type="text" name="phoneNum" id="phonenumber" value="<?php echo $phoneNum; ?>">

                    <br>

                    Email:<br>

                    <input type="email" name="email" id="email" value="<?php echo $email; ?>">

                    <br>

                    Address:<br>

                    <input type="text" name="address" id="address" value="<?php echo $address; ?>">

                    <label for="appointmentDescription">Appointment Description:</label>
                    <textarea id="appointment_description" name="appointment_description"><?php echo $description; ?>
                    </textarea>

                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" value="<?php echo $date; ?>">
                    <br>
                    <label for="time">Time:</label>
                    <input type="time" name="time" id="time" value="<?php echo $time; ?>">

                    <button type=" submit" id="submit">
                        <p>Update!</p>
                    </button>

                </fieldset>

            </form>

    </section>
    </div>
</body>

</html>

<script src="./app.js"></script>

</body>

</html>