<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
	$userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: admin_login.php");
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Employee Details</a>
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
                <li class="nav-item active">
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
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Position</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php
            $qr = "SELECT * FROM `employee_details` ORDER BY id DESC";
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

        ?>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $departmentName; ?></td>
            <td><?php echo $position; ?></td>
            <td><a href="employee_profile.php?id=<?php echo $id; ?>"><button class="btn btn-sm btn-success">View profile</button></a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
        
    </div>
</body>
</html>