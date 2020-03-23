<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
} else {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>HR Dashboard</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
                <h3><a href="index.html" class="logo">HR Dashboard</a></h3>
        <?php include("admin_sidebar.php") ?>

        <!-- Page Content  -->
        
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
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>