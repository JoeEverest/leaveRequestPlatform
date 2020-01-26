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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>HR Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">HR Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="create_leave.php">Create Leave</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="departments.php">Departments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employee_details.php">Employee Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create_new_accounts.php">Create New Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="approved_pending_requests.php">Pending Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav><br>
    <div class="container">
        <h1>HR Dashboard</h1>
        <ul>
            <li><a href="create_leave.php">Create Leave</a></li>
            <li><a href="departments.php">Departments</a></li>
            <li><a href="employee_details.php">Employee Details</a></li>
            <li><a href="create_new_accounts.php">Create New Account</a></li>
            <li><a href="approved_pending_requests.php">Pending Requests</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>