<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
	$userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: admin_login.php");
}
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
    <title>Create Accounts</title>
</head>
<body>
    <div class="container">
        <ul>
            <li><a href="create_employee_account.php">Create Employee Account</a></li>
            <li><a href="create_manager_account.php">Create Manager Account</a></li>
            <li><a href="create_admin_account.php">Create HR Account</a></li>
        </ul>
    </div>
</body>
</html>