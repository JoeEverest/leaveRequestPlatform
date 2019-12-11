<?php

session_start();
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
		echo "<div class='errors'>Email or password was incorrect</div>";
	}

}

?>