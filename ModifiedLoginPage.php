<!-- <?php
// Start the session
session_start();

// Connect to the database
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Check if the user exists in the database
	$sql = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// User exists, create a session and redirect to the signed-in page
		$row = $result->fetch_assoc();
		$_SESSION["username"] = $row["username"];
		header("Location: signed_in.php");
		exit();
	} else {
		// User does not exist, display an error message
		echo "Invalid username or password.";
	}
}

$conn->close();
?> -->
