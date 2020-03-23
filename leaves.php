<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['management'])) {
	$userLoggedIn = $_SESSION['management'];
}
else{
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

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>