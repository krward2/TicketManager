<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['RNumber'])) {
    $number = $_GET['RNumber'];
    $sql = "SELECT * FROM REPORT where RNumber = $number";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No report number received on request at update_report_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Report Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div style="margin-top: 20px" class="container">
    <h1>Update Report</h1>
    <form action="update_report.php" method="post">
        <input type="hidden" name="RNumber" id="RNumber" value="<?php echo $row['RNumber'] ?>">
        <div class="form-group">
            <label for="report_number">Report Number</label>
            <input class="form-control" type="text" id="report_number" name="report_number">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input class="form-control" type="text" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="request">Type of Request</label>
            <input class="form-control" type="text" id="request" name="request">
        </div>
        <div class="form-group">
            <label for="request_resolved">Average Time Request Resolved</label>
            <input class="form-control" type="text" id="request_resolved" name="request_resolved">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" name='Submit' type="submit" value="Update">
        </div>
    </form>
    <div>
        <br>
        <a href="index.php">Back to Report Menu</a></br>
    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>