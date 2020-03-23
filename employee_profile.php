<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
} else {
    header("Location: logout.php");
}

if (isset($_GET['id'])) {
    $employeeID = $_GET['id'];
    $qr = "SELECT * FROM `employee_details` WHERE id = '$employeeID' ORDER BY id DESC";
    $qr = mysqli_query($con, $qr);
    while ($data = mysqli_fetch_array($qr)) {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $departmentId = $data['department_id'];
        $position = $data['position'];
        $date = $data['employment_date'];

        $getDepartment = "SELECT name FROM `departments` WHERE id = '$departmentId'";
        $getDepartment = mysqli_query($con, $getDepartment);
        $department = mysqli_fetch_array($getDepartment);
        $departmentName = $department['name'];
    }
} else {
    header("Location: employee_details.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Employee Details</title>
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
                <h3><a href="index.html" class="logo">Employee Profile</a></h3>
                <?php include("admin_sidebar.php") ?>
                <div class="container">
                    <h3><?php echo $name; ?></h3>
                    <ul>
                        <li>
                            <b>Email: </b><?php echo $email; ?>
                        </li>
                        <li>
                            <b>Department: </b><?php echo $departmentName; ?>
                        </li>
                        <li>
                            <b>Position: </b><?php echo $position; ?>
                        </li>
                        <li>
                            <b>Employment Date: </b><?php echo $date; ?>
                        </li>
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