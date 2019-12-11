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
    <title>Departments</title>
</head>
<body>
    <div class="container">
        <a href="create_department.php">Create Department</a>

        <table class="table table-striped table-sm">
            <thead>
                <th>SN</th>
                <th>Name</th>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM departments ORDER BY id ASC";
                    $query = mysqli_query($con, $query);
                    while ($dataRows = mysqli_fetch_array($query)) {
                        $id = $dataRows["id"];
                        $name = $dataRows["name"];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>