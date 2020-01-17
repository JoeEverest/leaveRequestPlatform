<?php
$email = '';
$username = '';
$password1 = '';
$password2 = '';$errors = '';

if (isset($_POST['signUp'])){
    session_start();

    if (isset($_SESSION['admin'])) {
        if (!$_POST['username'] | !$_POST['email'] | !$_POST['password'] | !$_POST['password2']) {
            echo('<div class="errors">You did not complete all required fields</div>');
        }else{
            $email = $_POST['email'];
            //echo $email; test passed
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                //Check if email already exists
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    
                //Count the number of rows returned
                $num_rows = mysqli_num_rows($e_check);
    
                if($num_rows > 0) {
                    echo "<div class='errors'>Email already in use<br></div>";
                }else{
                    $password1 = $_POST['password'];
                    $password2 = $_POST['password2'];
                    
                    if ($password1 != $password2) {
                        echo("Passwords don't match");
    
                        if (strlen($password1 > 30 || strlen($password1) < 8)) {
                            echo("<div class='errors'>Password should be between 8 and 30 characters</div>");
                        }
                    }else{
                        //echo $password1; Test passed
                        $password1 = md5($password1);
                        //echo $password1; test passed
                        $username = $_POST['username'];
                        $register = mysqli_query($con, "INSERT INTO management VALUES ('', '$username', '$email', '$password1')");
                        header("Location: management_dashboard.php");
                        exit();
                    }
                }
            }else{
                echo('<div class="errors">Invalid email format</div>');
            }
        }
    }
    else{
        header("Location: employee_details.php");
    }
    
}

?>