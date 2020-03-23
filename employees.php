<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
    $userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: login.php");
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
    <div class="container">
        <h1>Pending Leaves</h1>
        <table class="table table-striped table-sm">
            <thead>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Department</th>
                <th>Employment date</th>
            </thead>
            <?php
            $query = "SELECT * FROM employee_details ORDER BY id ASC";
            $query = mysqli_query($con, $query);
            while ($requests = mysqli_fetch_array($query)) {
                $id = $requests["id"];
                $name = $requests["name"];
                $email = $requests["email"];
                $position = $requests["position"];
                $departmentId = $requests["department_id"];
                $employmentDate = $requests["employment_date"];

                $q = "SELECT * FROM departments WHERE id = '$id'";
                $q = mysqli_query($con, $q);
                while ($requests = mysqli_fetch_array($q)) {
                    $depName = $requests["name"];
                }
            ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $position; ?></td>
                <td><?php echo $depName; ?></td>
                <td><?php echo $employmentDate; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>