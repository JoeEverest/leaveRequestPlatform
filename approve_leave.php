<?php
include('includes/config.php');
session_start();
if (isset($_GET['id'])) {
    $requestID = $_GET['id'];
    
    $query = "SELECT * FROM manager_leave_requests WHERE id = '$requestID'";
    $query = mysqli_query($con, $query);
    while ($dataRows = mysqli_fetch_array($query)) {
        $name = $dataRows["employee_name"];
        $leaveRequested = $dataRows["leave_request"];
        $attachments = $dataRows["attachments"];
        $date = $dataRows["date"];
        $status = $dataRows["status"];
        $department = $dataRows['department'];
    }

    //change status to approved
    $update = "UPDATE `manager_leave_requests` SET `status` = 'APPROVED' WHERE `manager_leave_requests`.`id` = '$requestID'";
    if (mysqli_query($con, $update)) {
        $addToTable = "INSERT INTO hr_leave_requests VALUES ('', '$requestID', '$name','$leaveRequested', '$attachments', '$department', '$date', '$status')";
        if (mysqli_query($con, $addToTable)) {
            header('Location: pending_leave_requests.php');
        }else{
            echo mysqli_error($con);
            echo 'There was an error';
        }                
    }else{
        echo mysqli_error($con);
        echo 'There was an error';
    }

}else {
    header("Location: index.php");
}
?>