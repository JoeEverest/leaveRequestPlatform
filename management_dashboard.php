<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['management'])) {
	$userLoggedIn = $_SESSION['management'];
}
else{
	header("Location: managerial_login.php");
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
    <title>Management Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Management Dashboard</h2>
        <ul>
        <li><a href="pending_leave_requests.php">Pending Requests</a></li>
        <li><a href="logout.php">logout</a></li>
        </ul>
        
        
    </div>
</body>
</html>