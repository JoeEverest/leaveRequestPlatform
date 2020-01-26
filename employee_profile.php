<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
	$userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: admin_login.php");
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
}else {
    header("Location: employee_details.php");
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
    <title>Employee Details</title>
</head>
<body>
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
</body>
</html>
