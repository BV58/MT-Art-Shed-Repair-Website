<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 100%;
            margin: 0 auto;

        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Appointment Details</h2>
                        <a href="appointment.html" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add
                            New
                            Appointment</a>
                    </div>
                    <?php
                    session_start();
                    // Include config file
                    require_once "config.php";
                    $email = $_SESSION['email'];

                    $temp = "SELECT * FROM users WHERE email = '$email'";
                    $result2 = $db->query($temp);
                    $row = $result2->fetch();
                    if ($row['authLevel'] == 1) {
                        $sql = "SELECT * FROM appointments";
                    } else {
                        $sql = "SELECT * FROM appointments WHERE email = '$email'";
                    }
                    if ($result = $db->query($sql)) {
                        if ($result->rowCount() > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID Number</th>";
                            echo "<th>Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Phone Number</th>";
                            echo "<th>Address</th>";
                            echo "<th>Date</th>";
                            echo "<th>Time</th>";
                            echo "<th>Description</th>";
                            echo "<th>Resolved</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phoneNum'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                $time = $row['time'];
                                echo "<td>" . date('h:i', strtotime($time)) . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['resolved'] . "</td>";
                                echo "<td>";
                                echo '<a href="updateAppointment.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>