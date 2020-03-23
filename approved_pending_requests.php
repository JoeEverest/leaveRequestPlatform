<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
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
                <h3><a href="index.html" class="logo">HR Dashboard</a></h3>
                <?php include("admin_sidebar.php") ?>
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
                            $query = "SELECT * FROM hr_leave_requests WHERE status = 'PENDING' ORDER BY id ASC";
                            $query = mysqli_query($con, $query);
                            while ($requests = mysqli_fetch_array($query)) {
                                $id = $requests["request_id"];
                                $name = $requests["name"];
                                $leaveRequested = $requests["leave_requested"];
                                $attachments = $requests["attachments"];
                                $daysRequested = $requests["number_of_days"];
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
                                        <a href="approve_leave_days.php?id=<?php echo $id; ?>">
                                            <button class="btn btn-success">Approve</button>
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