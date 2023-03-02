<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>

<body>

<p class="auto-style1"><strong>Customer Account Page </strong></p>
<form action="CustomerAccountConnection.php" method="post">
	Welcome, <?php echo "example_user" ?>!<br />
	</form>
<form action="ChatPage.html" method="post">
<button type="button" name="button" id="chat" class="btn login_btn">Chat</button>
    
</form>

<form action="viewAppointments.php" method="post">
	<input name="Appointmentbtn" type="button" value="Appointments" /></form>
<form action="" method="post">
	<input name="EditAccountbutton" style="width: 151px" type="button" value="Edit Account" />
</form>
<script>
	$(function () {
		$('#chat').click(function (e) {
            <?php
    setTimeout('window.location.href = "ChatPage.html"', 1000);
    ?>
        }
    });
            </script>
</body>
</html>