<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
} else {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Employee Details</title>
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
                <h3><a href="index.html" class="logo">Employee Details</a></h3>
                <?php include("admin_sidebar.php") ?>
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
            </div>

            <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/main.js"></script>
</body>

</html>