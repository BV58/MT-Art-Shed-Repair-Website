<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "config.php";

// Start the session
session_start();

// Check authentication and authorization here
if (!isset($_SESSION['userlogin']) || empty($_SESSION['userlogin'])) {
    header("Location: login.php");
    exit();
}

$userlogin = $_SESSION['userlogin']['name'];

$sql = "SELECT * FROM users WHERE name=:userlogin";
$stmt = $db->prepare($sql);
$stmt->bindParam(':userlogin', $userlogin);
if (!$stmt->execute()) {
    // handle the error here, e.g. log it or display an error message
    die("Error executing query: " . $stmt->errorInfo()[2]);
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $address = $row['address'];
} else {
    echo "Invalid user ID.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    // Update the user's details in the database
    $sql = "UPDATE users SET name=:name, email=:email, address=:address, phone_number=:phone_number WHERE name=:userlogin";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':userlogin', $userlogin);

    if ($stmt->execute()) {
        // Update the user's session with the new values
        $_SESSION['userlogin']['name'] = $name;
        $_SESSION['userlogin']['email'] = $email;
        $_SESSION['userlogin']['phone_number'] = $phone_number;
        $_SESSION['userlogin']['address'] = $address;

        header("Location: CustomerAccountPage.php");
        exit();
    } else {
        echo "Something went wrong. Please try again later.";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User Edit Account Form</title>
</head>

<body>
    <h2>User Edit Account Form</h2>
    <form method="post">
        <fieldset>
            <legend>Account Information</legend>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            <br>
            <label for="phone_number">Phone Number:</label><br>
            <input type="number" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">
            <br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            <br><br>
            <input type="submit" value="Update" name="update">
        </fieldset>
    </form>
</body>

</html>
<?php
if ($row) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $address = $row['address'];
} else {
    echo "Invalid user ID.";
}
?>