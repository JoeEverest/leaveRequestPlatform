<?php
include('includes/config.php');
include('includes/management/management_register_handler.php');
include('includes/management/management_login_handler.php');

if (isset($_GET['email'])) {
    $emailReg = $_GET['email'];
}else {
    header("Location: create_manager_account.php");
}
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
            <h3>Manegerial Register</h3>
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username">
            <label for="email">Email Address</label>
            <input class="form-control" type="email" readonly name="email" id="email" value="<?php echo $emailReg; ?>" placeholder="Email Address">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            <label for="password2">Confirm Password</label>
            <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Password">
            <br>
            <button class="btn btn-success" type='signUp' name="signUp">Sign Up</button>
        </form>
    </div>
</div></body>
</html>