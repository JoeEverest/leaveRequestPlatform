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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>My Requests</title>
</head>
<body><div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4 pt-5">
            <h3><a href="index.html" class="logo">My Leave Requests</a></h3>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="dashboard.php">Home</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
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

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">

            <div class="table-responsive">
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
        </div>
    </div>
</div>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>