<?php
include('includes/config.php');
session_start();
include('includes/loginHandler.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/login.css">
    <title>Operator Login</title>
</head>
<body>
    <div class="container">
    
    
    <div class="formHolder">
        <form method="post">
            <h3>Login</h3>
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