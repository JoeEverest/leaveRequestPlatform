<?php
if (isset($_POST['logIn'])) {
	$email = filter_var($_POST['logemail'], FILTER_SANITIZE_EMAIL);//Sanitize email

	$_SESSION['logemail'] = $email;//Store email into session variable
	$password = md5($_POST['logpassword']);//Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM employees WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if ($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$log_email = $row['email'];

		$_SESSION['username'] = $log_email;
		header("Location: dashboard.php");
		exit();
	}
	else{
		if (isset($_POST['logIn'])) {
			$email = filter_var($_POST['logemail'], FILTER_SANITIZE_EMAIL);//Sanitize email
		
			$_SESSION['logemail'] = $email;//Store email into session variable
			$password = md5($_POST['logpassword']);//Get password
		
			$check_database_query = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
			$check_login_query = mysqli_num_rows($check_database_query);
		
			if ($check_login_query == 1) {
				$row = mysqli_fetch_array($check_database_query);
				$log_email = $row['email'];
		
				$_SESSION['admin'] = $log_email;
				header("Location: admin_dashboard.php");
				exit();
			}
			else{
				if (isset($_POST['logIn'])) {
					$email = filter_var($_POST['logemail'], FILTER_SANITIZE_EMAIL);//Sanitize email
				
					$_SESSION['logemail'] = $email;//Store email into session variable
					$password = md5($_POST['logpassword']);//Get password
				
					$check_database_query = mysqli_query($con, "SELECT * FROM management WHERE email='$email' AND password='$password'");
					$check_login_query = mysqli_num_rows($check_database_query);
				
					if ($check_login_query == 1) {
						$row = mysqli_fetch_array($check_database_query);
						$log_email = $row['email'];
				
						$_SESSION['management'] = $log_email;
						header("Location: management_dashboard.php");
						exit();
					}
					else{
						echo "<div class='errors'>Email or password was incorrect</div>";
					}
				
				}
			}
		
		}
	}

}

?>