<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
} else {
    header("Location: employee_login.php");
}
$error = "";
if (isset($_POST['submit'])) {
    if (!$_POST['name'] | !$_POST['user'] | !$_POST['number_of_days']) {
        echo "<script>alert('All Fields are required');</script>";
    } else {
        $leaveName = $_POST['name'];
        $email = $_POST['user'];
        $attachement = $_FILES['attachments']['name'];
        $upload = "uploads/" . basename($attachement = $_FILES['attachments']['name']);

        $getReq = "SELECT * FROM employee_details WHERE email = '$email'";
        $getReq = mysqli_query($con, $getReq);
        while ($data = mysqli_fetch_array($getReq)) {
            $name = $data['name'];
            $departmentID = $data['department_id'];
            $position = $data['position'];
        }
        $getDep = "SELECT * FROM departments WHERE id = '$departmentID'";
        $getDep = mysqli_query($con, $getDep);
        while ($data = mysqli_fetch_array($getDep)) {
            $departmantName = $data['name'];
        }
        $numberOfDays = $_POST['number_of_days'];
        $today = date('Y-m-d', strtotime('Today'));
        $addToTable = "INSERT INTO manager_leave_requests VALUES ('', '$name','$userLoggedIn', '$leaveName', '$attachement', '$numberOfDays', '$departmantName', '$today', 'PENDING')";
        if (!$_FILES['attachments']['name']) {
            header('Location: my_requests.php');
        } else {
            if (mysqli_query($con, $addToTable)) {
                if (move_uploaded_file($_FILES['attachments']['tmp_name'], $upload)) {
                    echo "<script> alert('Leave request submitted'); </script>";
                    header('Location: my_requests.php');
                } else {
                    echo mysqli_error($con);
                    echo 'There was an error ' . $error;
                }
            } else {
                echo mysqli_error($con);
                echo 'There was an error ' . $error;
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Home</title>
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
				<h3><a href="index.html" class="logo">Employee dashboard</a></h3>
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="#">Home</a>
					</li>
					<li>
						<a href="my_requests.php">My Requests</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
				</ul>

				<div class="footer">
					<p>
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved
					</p>
				</div>

			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<div class="container">
				<h3>Request Leave</h3>
				<?php
				if (isset($_GET['id'])) {
					echo '<form method="post" enctype="multipart/form-data">';
					$leaveId = $_GET['id'];
					$getDetails = "SELECT * FROM leaves WHERE id = '$leaveId'";
					$getDetails = mysqli_query($con, $getDetails);
					while ($data = mysqli_fetch_array($getDetails)) {
						$leaveTitle = $data["title"];
						$leaveTitle = urldecode($leaveTitle);
						$leaveLength = $data["max_length"];
						$leaveCondition = $data["leave_condition"];
						$leaveCondition = urldecode($leaveCondition);
					}
				?>
		
					<label for="name">Requesting:</label>
					<input type="text" class="form-control" readonly name="name" value="<?php echo $leaveTitle; ?>"><br>
					<label><b>Maximum Number of days:</b></label>
					<span><?php echo $leaveLength; ?></span><br>
					<label><b>Conditions:</b></label>
					<span><?php echo $leaveCondition; ?></span><br>
					<label>User:</label>
					<input type="text" class="form-control" readonly name="user" value="<?php echo $userLoggedIn; ?>"><br>
					<label for="number_of_days">Number of Days:</label>
					<input type="number" name="number_of_days" class="form-control"><br>
					<label for="attachments">Upload Attachments;</label>
					<input type="file" name="attachments" class="form-control-file"><br>
					<button name="submit" class="btn btn-info">Submit Request</button>
					</form>
				<?php
				} else {
				?>
					<form method="get"><br>
						<label for="customer_name">Select Leave:</label>
						<select class="form-control" required name="id">
							<option value=""></option>
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
								<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
							<?php } ?>
						</select><br>
					<?php
					echo '<button type="submit" class="btn btn-success">Next</button></form>';
				}
					?>
					</form>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>