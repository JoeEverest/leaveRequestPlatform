<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['management'])) {
    $userLoggedIn = $_SESSION['management'];
} else {
    header("Location: logout.php");
}

$q = "SELECT * FROM employee_details WHERE email = '$userLoggedIn' ORDER BY id ASC";
$q = mysqli_query($con, $q);
while ($dataRows = mysqli_fetch_array($q)) {
    $depId = $dataRows["department_id"];
}
$getDepartment = "SELECT * FROM departments WHERE id = '$depId'";
$getDepartment = mysqli_query($con, $getDepartment);
while ($data = mysqli_fetch_array($getDepartment)) {
    $depName = $data["name"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Pending Leaves</title>
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
                    <li>
                        <a class="nav-link" href="management_dashboard.php">Home</a>
                    </li>
                    <li class="active">
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

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <th>Employee Name</th>
                            <th>Leave Requested</th>
                            <th>Attached Files</th>
                            <th>Days Requested</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <?php
                        $query = "SELECT * FROM manager_leave_requests WHERE department = '$depName' AND status = 'PENDING' ORDER BY id ASC";
                        $query = mysqli_query($con, $query);
                        while ($requests = mysqli_fetch_array($query)) {
                            $id = $requests["id"];
                            $name = $requests["employee_name"];
                            $leaveRequested = $requests["leave_request"];
                            $daysRequested = $requests["number_of_days"];
                            $attachments = $requests["attachments"];
                            $date = $requests["date"];
                            $status = $requests["status"];
                        ?>
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $leaveRequested; ?></td>
                                <td><a target="blank" href="uploads/<?php echo $attachments; ?>"><?php echo $attachments; ?></a></td>
                                <td><?php echo $daysRequested; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                    <a href="approve_leave.php?id=<?php echo $id; ?>">
                                        <button class="btn btn-success">Approve</button>
                                    </a>
                                    <a href="decline_leave.php?id=<?php echo $id; ?>">
                                        <button class="btn btn-danger">Decline</button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
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