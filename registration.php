<?php

require_once("config.php");

?>
<html>

<head>
    <title>User Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

    <div>
        <form action="registration.php" method="post">

            <div class="container">
                <div class="row">
                    <div class="col-sm-5">

                        <h1>User Registration</h1>
                        <p></p>
                        <hr class="mb-5">
                        <label for="name"><b>Name</b></label>
                        <input class="form-control" id="name" type="text" name="name" required>

                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" id="phonenumber" type="text" name="phonenumber" required>

                        <label for="address"><b>Address</b></label>
                        <input class="form-control" id="address" type="text" name="address" required>

                        <label for="email"><b>Email Address</b></label>
                        <input class="form-control" id="email" type="email" name="email" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" id="password" type="password" name="password" required>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up!">
                    </div>
                </div>
            </div>

        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function () {
            $('#register').click(function (e) {

                var valid = this.form.checkValidity();

                if (valid) {


                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phonenumber = $('#phonenumber').val();
                    var address = $('#address').val();
                    var password = $('#password').val();


                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: { name: name, address: address, email: email, phonenumber: phonenumber, password: password },
                        success: function (data) {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                            })
                            setTimeout(' window.location.href =  "login.php"', 1000);

                        },
                        error: function (data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
                                'type': 'error'
                            })
                        }
                    });


                } else {

                }





            });


        });

    </script>
</body>

</html>