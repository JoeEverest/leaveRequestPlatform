<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
	$userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: admin_login.php");
}

if (isset($_POST['submit'])) {
    if (!$_POST['name']) {
        echo "<script>alert('Department Name Required');</script>";
    }else{
        $departmentName = $_POST['name'];
        
        $insert = mysqli_query($con, "INSERT INTO departments VALUES ('', '$departmentName')");
        header("Location: departments.php");
    }
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
    <title>Create Departments</title>
</head>
<body>
    <div class="container">
        <h2>Create Department</h2>
        <form method="post">
            <label for="name">Departmant Name</label>
            <input type="text" name="name" placeholder="Department Name" required class="form-control"><br>
            <button type="submit" name="submit" class="btn btn-info">Create Department</button>
        </form>
    </div>
</body>
</html>