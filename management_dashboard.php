<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['management'])) {
    $userLoggedIn = $_SESSION['management'];
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
    <title>Management Dashboard</title>
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
                <h3><a href="management_dashboard.php" class="logo">Manager Dashboard</a></h3>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a class="nav-link" href="management_dashboard.php">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="pending_leave_requests.php">Pending Requests</a>
                    </li>
                    <li>
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>

                <div class="footer">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>

            </div>
        </nav>
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container">
                <ul>
                    <li><a href="pending_leave_requests.php">Pending Requests</a></li>
                    <li><a href="logout.php">logout</a></li>
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