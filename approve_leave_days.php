<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
	$userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: logout.php");
}

if (isset($_GET['id'])) {
    $reqID = $_GET['id'];
}else{
    header("Location: approved_pending_requests.php");
}

$query = "SELECT * FROM hr_leave_requests WHERE request_id = '$reqID' ORDER BY id ASC";
$query = mysqli_query($con, $query);
while ($requests = mysqli_fetch_array($query)) {
    $name = $requests["name"];
    $leaveRequested = $requests["leave_requested"];
    $attachments = $requests["attachments"];
    $daysRequested = $requests["number_of_days"];
    $status = $requests["status"];
}
if (isset($_POST['approve'])) {
    if (!$_POST['days_approved']) {
        echo "<script>alert('All Input Fields are required');</script>";
    }else{
        $daysApproved = $_POST['days_approved'];
        $date = date("Y-m-d", strtotime("Today"));

        $update = "UPDATE `hr_leave_requests` SET `status` = 'APPROVED' WHERE `hr_leave_requests`.`request_id` = '$reqID'";
        if (mysqli_query($con, $update)) {
            $approve = "INSERT INTO hr_approved_requests VALUES ('', '$reqID', '$name', '$leaveRequested', '$daysApproved', '$date')";
            if (mysqli_query($con, $approve)) {
                header("Location: approved_pending_requests.php");
            }else{
                echo mysqli_error($connect);
                echo 'There was an error ';
            }                
        }else{
            echo mysqli_error($con);
            echo 'There was an error';
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
	<title>Approve Leave</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Create Account</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
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
                <li class="nav-item active">
                    <a class="nav-link" href="approved_pending_requests.php">Pending Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav><br>
    <div class="container">
        <h3>Approve Leave Request For: <?php echo $name; ?></h3>
        <form method="post">
            <label for="name">Employee Name:</label>
            <input type="text" name="name" readonly value="<?php echo $name; ?>" class="form-control">
            <label for="leave_requested">Leave Requested:</label>
            <input type="text" name="leave_requested" class="form-control" readonly value="<?php echo $leaveRequested; ?>">
            <label for="days_approved">Days requested:</label>
            <input type="number" readonly name="days_approved" class="form-control" value="<?php echo $daysRequested; ?>"><br>
            <button type="submit" name="approve" class="btn btn-success">Approve</button>
        </form>
    </div>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>