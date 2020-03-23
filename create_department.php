<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
} else {
    header("Location: logout.php");
}

if (isset($_POST['submit'])) {
    if (!$_POST['name']) {
        echo "<script>alert('Department Name Required');</script>";
    } else {
        $departmentName = $_POST['name'];

        $insert = mysqli_query($con, "INSERT INTO departments VALUES ('', '$departmentName')");
        header("Location: departments.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Create Departments</title>
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
                <h3><a href="index.html" class="logo">Create Department</a></h3>
                <?php include("admin_sidebar.php") ?>
                <div class="container">
                    <h2>Create Department</h2>
                    <form method="post">
                        <label for="name">Departmant Name</label>
                        <input type="text" name="name" placeholder="Department Name" required class="form-control"><br>
                        <button type="submit" name="submit" class="btn btn-info">Create Department</button>
                    </form>
                </div>
            </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>