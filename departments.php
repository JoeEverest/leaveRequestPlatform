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
    <title>Departments</title>
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
                <h3><a href="index.html" class="logo">Departments</a></h3>
                <?php include("admin_sidebar.php") ?>
                <div class="container">
                    <a href="create_department.php">Create Department</a>
                    <br>

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
            </div>
            <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/main.js"></script>
</body>

</html>