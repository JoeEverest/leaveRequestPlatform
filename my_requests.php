<?php
include('includes/config.php');
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
}
else{
	header("Location: employee_login.php");
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
    <title>My Requests</title>
</head>
<body>
    <div class="container">
        <h3>My Leave Requests</h3>
        <table class="table table-stripped table-sm">
            <thead>
                <th>Name</th>
                <th>Leave Requested</th>
                <th>Manager Feedback</th>
                <th>HR Feedback</th>
                <th>Days Requested</th>
                <th>Date of Approval</th>
            </thead>
            <tbody>
                <?php
                $getReq = "SELECT * FROM manager_leave_requests WHERE email = '$userLoggedIn' ORDER BY date DESC";
                $getReq = mysqli_query($con, $getReq);
                while ($data = mysqli_fetch_array($getReq)) {
                    $reqID = $data['id'];
                    $name = $data['employee_name'];
                    $leaveRequested = $data['leave_request'];
                    $daysRequested = $data['number_of_days'];
                    $status = $data['status'];
                    
                    $hrStatus = "SELECT * FROM hr_leave_requests WHERE request_id = '$reqID'";
                    $hrStatus = mysqli_query($con, $hrStatus);
                    while ($dataReq = mysqli_fetch_array($hrStatus)) {
                        $statusHR = $dataReq['status'];
                        
                        $hrStatus = "SELECT * FROM hr_approved_requests WHERE request_id = '$reqID'";
                        $hrStatus = mysqli_query($con, $hrStatus);
                        while ($dataGet = mysqli_fetch_array($hrStatus)) {
                            $daysApproved = $dataGet['days_approved'];
                            $date = $dataGet['date'];
                        }
                    }
                
                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $leaveRequested; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $statusHR; ?></td>
                    <td><?php echo $daysRequested; ?></td>
                    <td><?php echo $date; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>