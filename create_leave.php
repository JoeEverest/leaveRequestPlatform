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
    if (!$_POST['title'] | !$_POST['length'] | !$_POST['condition']) {
        echo "<script>alert('All input Fields are Required');</script>";
    }else {
        $title = $_POST['title'];
        $length = $_POST['length'];
        $condition = $_POST['condition'];

        $title = urlencode($title);
        $length = urlencode($length);
        $condition = urlencode($condition);

        $addToTable = "INSERT INTO leaves VALUES ('', '$title','$length', '$condition')";
        if (mysqli_query($con, $addToTable)) {
            header('Location: leaves.php');
        }else{
            echo mysqli_error($connect);
            echo 'There was an error '.$error;
        }
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
    <title>Create Leave</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Create Leave</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
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
        <form method="post">
            <label for="title">Leave Tittle</label>
            <input required type="text" name="title" class="form-control" placeholder="Leave Title">
            <label for="length">Leave Maximum Length (Days)</label>
            <input required type="number" name="length" class="form-control" placeholder="Max Length">
            <label for="condition">Leave Conditions</label>
            <textarea required name="condition" class="form-control" cols="30" rows="10"></textarea>
            <br>
            <button class="btn btn-success" name="submit">Add Leave</button>
        </form>
    </div>
</body>
</html>