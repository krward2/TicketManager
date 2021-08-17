<?php

session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['RNumber'])){
    $number = $_GET['RNumber'];
    $query = "DELETE from REPORT where RNumber = $number";

    if ($conn->query($query) === TRUE) {
        echo "Report deleted successfully";
        header("Location: view_reports.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else{
    echo "No report number received";
    header("Location: view_reports.php");
}
?>