<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['RNumber'])){

    $RNumber = isset($_POST['RNumber']) ? $_POST['RNumber'] : " ";
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $date = isset($_POST['date']) ? $_POST['date'] : " ";
    $request = isset($_POST['request']) ? $_POST['request'] : " ";
    $RResolved= isset($_POST['request_resolved']) ? $_POST['request_resolved'] : " ";

    $query = "UPDATE REPORT SET TTUsername='$username', RDate='$date', RRequest='$request', RResolve='$resolved' WHERE RNumber = $RNumber";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Report updated successfully";
        header("Location: view_reports.php");
    } else {
        echo "Error updating report: " . mysqli_error($conn);
    }

}
else {
    echo "No report number received on request at update report";
    die();
}

?>