<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['management'])) {
    $userLoggedIn = $_SESSION['management'];
}
else{
	header("Location: managerial_login.php");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Pending Leaves</title>
</head>
<body>
    <div class="container">
        <h1>Pending Leaves</h1>
        <table class="table table-striped table-sm">
            <thead>
                <th>Employee Name</th>
                <th>Leave Requested</th>
                <th>Attached Files</th>
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
                $attachments = $requests["attachments"];
                $date = $requests["date"];
                $status = $requests["status"];
            ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $leaveRequested; ?></td>
                <td><a target="blank" href="uploads/<?php echo $attachments; ?>"><?php echo $attachments; ?></a></td>
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
</body>
</html>