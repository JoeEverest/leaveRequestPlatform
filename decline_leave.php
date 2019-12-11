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
        $status = $dataRows["status"];
    }

    //change status to approved
    $update = "UPDATE `manager_leave_requests` SET `status` = 'DECLINED' WHERE `manager_leave_requests`.`id` = '$requestID'";
    if (mysqli_query($con, $update)) {
        header('Location: pending_leave_requests.php');
    }else{
        echo mysqli_error($con);
        echo 'There was an error';
    }

}else {
    header("Location: index.php");
}
?>