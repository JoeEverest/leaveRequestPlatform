<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['management'])) {
	$userLoggedIn = $_SESSION['management'];
}
else{
	header("Location: managerial_login.php");
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
    <title>Create Leave</title>
</head>
<body>
    <div class="container">
        <h1>Leaves</h1>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Tittle</th>
                <th>Max Days</th>
                <th>Condition</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
            $extract = "SELECT * FROM leaves ORDER BY id DESC";
            $execute = mysqli_query($con, $extract);
                    while ($dataRows = mysqli_fetch_array($execute)) {
                        $id = $dataRows["id"];
                        $title = $dataRows["title"];
                        $title = urldecode($title);
                        $length = $dataRows["max_length"];
                        $condition = $dataRows["leave_condition"];
                        $condition = urldecode($condition);
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $length; ?></td>
                    <td><?php echo $condition; ?></td>
                    <td><button class="btn btn-info">Edit</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>