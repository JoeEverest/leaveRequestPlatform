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
    <title>Create Accounts</title>
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
                <h3><a href="index.html" class="logo">Create Accounts</a></h3>
                <?php include("admin_sidebar.php") ?>
                <div class="container">
                    <ul>
                        <li><a href="create_employee_account.php">Create Employee Account</a></li>
                        <li><a href="create_manager_account.php">Create Manager Account</a></li>
                        <li><a href="create_admin_account.php">Create HR Account</a></li>
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