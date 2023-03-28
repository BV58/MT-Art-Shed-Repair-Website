<?php

include "config.php";

	if(isset($_POST['update'])){
	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	
	$email = $_POST['email'];
	
	$phoneNumber = $_POST['phoneNumber'];
	
	$address = $_POST['address'];
	
	$password = $_POST['password'];
	
	$sql = "UPDATE 'users' SET 
	'name' = '$name', 'email' = '$email', 'phoneNumber' = '$phoneNumber', 'address' = '$address',
	'password' = '$password' WHERE 'id' = '$id';

	$result = $conn->query($sql);

	if ($result == TRUE){
		
		echo "Account updated successfully.";
		
	}else{
		
		echo echo "Error:" . $sql . "<br>" . $conn->error;

	}

}

if(isset($_GET['id'])){
	
	$id = $_GET['id'];

	$sql = "SELECT * FROM 'users' WHERE 'id' = '$id'";
	
	$result = $conn->query($sql);

	if($result == TRUE){->num_rows > 0){
		
		while($row = $result->fetch_assoc()){

			$id = $row['id'];

			$name = $row['name'];
	
			$email = $row['email'];
	
			$phonenumber = $row['phonenumber'];
	
			$address = $row['address'];
	
			$password = $row['password'];

		}
		
?>

<h2>User Update Form</h2>

<form method="" method="post">

    <fieldset>

        <legend>Account Information</legend>

        Name:<br>

        <input type="text" name="name" value="<?php echo $name; ?>">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <br>

        Email:<br>

		<input type="email" name="email" value="<?php echo $email; ?>">

		<br>

		Phone Number:<br>

		<input type="number" name="phone" value="<?php echo $phoneNumber; ?>">

		<br>

		Address:<br>

		<input type="text" name="address" value="<?php echo $address; ?>">

		<br><br>

		<input type="submit" value="Update"name="update">

	</fieldset>

</form>

</body>

</html>

<?php

}else{

	header("Location: CustomerAccountPage.php");

	}
}

?>




