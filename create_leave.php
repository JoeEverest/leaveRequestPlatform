<?php
include('includes/config.php');
session_start();

if (isset($_SESSION['admin'])) {
	$userLoggedIn = $_SESSION['admin'];
}
else{
	header("Location: logout.php");
}

if (isset($_POST['submit'])) {
    if (!$_POST['title'] | !$_POST['length'] | !$_POST['condition']) {
        echo "<script>alert('All input Fields are Required');</script>";
    }else {
        $title = $_POST['title'];
        $length = $_POST['length'];
        $condition = $_POST['condition'];

        $title = urlencode($title);
        $length = urlencode($length);
        $condition = urlencode($condition);

        $addToTable = "INSERT INTO leaves VALUES ('', '$title','$length', '$condition')";
        if (mysqli_query($con, $addToTable)) {
            header('Location: leaves.php');
        }else{
            echo mysqli_error($connect);
            echo 'There was an error '.$error;
        }
    }
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
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
                <h3><a href="#" class="logo">Create Leave</a></h3>
        <?php include("admin_sidebar.php") ?>
    <div class="container">
        <form method="post">
            <label for="title">Leave Tittle</label>
            <input required type="text" name="title" class="form-control" placeholder="Leave Title">
            <label for="length">Leave Maximum Length (Days)</label>
            <input required type="number" name="length" class="form-control" placeholder="Max Length">
            <label for="condition">Leave Conditions</label>
            <textarea required name="condition" class="form-control" cols="30" rows="10"></textarea>
            <br>
            <button class="btn btn-success" name="submit">Add Leave</button>
        </form>
    </div>
</body>
</html>