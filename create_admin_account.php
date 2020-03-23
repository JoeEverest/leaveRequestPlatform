<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
} else {
    header("Location: logout.php");
}

if (isset($_POST['submit'])) {
    if (!$_POST['name'] | !$_POST['email'] | !$_POST['employment_date']) {
        echo "<script>alert('All Input Fields are required');</script>";
    } else {
        $name = $_POST['name'];
        $name = urlencode($name);

        $email = $_POST['email'];
        $position = $_POST['position'];
        $date = $_POST['employment_date'];

        $addToTable = "INSERT INTO employee_details VALUES ('', '$name', '$email', '$position', '3', '$date')";
        if (mysqli_query($con, $addToTable)) {
            header("Location: admin_register.php?email=" . $email);
        } else {
            echo mysqli_error($connect);
            echo 'There was an error ' . $error;
        }
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
    <title>Create New Account</title>
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
                <h3><a href="index.html" class="logo">Create Admin Account</a></h3>
                <?php include("admin_sidebar.php") ?>
                <div class="container">
                    <h2>Create New Manager Account</h2>
                    <form method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" required class="form-control">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="name@example.com" required class="form-control">
                        <label for="position">Job Position</label>
                        <input type="text" name="position" value="HR" readonly class="form-control" placeholder="Job Position">
                        <label for="department">Department</label>
                        <label for="employment_date">Employment Date</label>
                        <input type="date" name="employment_date" class="form-control" required>
                        <br>
                        <button type="submit" name="submit" class="btn btn-success">Next</button>
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