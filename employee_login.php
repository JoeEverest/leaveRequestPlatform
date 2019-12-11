<?php
include('includes/config.php');
include('includes/registerHandler.php');
include('includes/loginHandler.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Operator Login</title>
</head>
<body>
    <div class="container">
    
    
    <div class="formHolder">
        <form method="post">
            <h3>Employee Login</h3>
            <label for="logemail">Email Address</label>
            <input type="email" class="form-control" name="logemail" id="logEmail" placeholder="Email Address">
            <label for="logpassword">Password</label>
            <input type="password" class="form-control" name="logpassword" id="pass" placeholder="Password">
            <br>
            <button name="logIn" class="btn btn-success">Log In</button>
        </form>
    </div>
</div></body>
</html>