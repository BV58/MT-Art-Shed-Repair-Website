<?php
session_start();
?>

<html lang="en">

<head>
  <title>Create Appointment.</title>
  <link rel="stylesheet" type="text/css" href="appointment.css" />
  <link rel="icon" type="image/x-icon" href="\images\favicon.ico">
</head>

<body>

  <!-- NAVI HEADER -->
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
        <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create your
          appointment!</h1>
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our team members will visit you for a free
          estimate!</h2>
      </div>
      <form action="create.php" method="POST">

        <fieldset>

          <legend>Personal information:</legend>

          Full name:<br>

          <input type="text" name="name" id="name" required>

          <br>

          Phone Number:<br>

          <input type="text" name="phoneNum" id="phonenumber" required>

          <br>

          Email:<br>
          <!-- Add value here for email, do not let the user change-->
          <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" readonly required>

          <br>

          Address:<br>

          <input type="text" name="address" id="address" required>

          <label for="appointmentDescription">Appointment Description:</label>
          <textarea id="appointment_description" name="appointment_description"
            placeholder="Roof repair after tree fall damage." required></textarea>

          <label for="date">Date:</label>
          <input type="date" name="date" id="date"
            min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); ?>" required>
          <br>
          <label for="time">Time:</label>
          <input type="time" name="time" id="time" min="09:00" max="20:00" required>

          <button type="submit" id="submit">
            <p>Create!</p>
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