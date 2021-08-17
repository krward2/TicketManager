<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file inserts a new record  into the table Student of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create Report</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div style="margin-top: 20px" class="container">
    <h1>Create Report</h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <form action="create_report.php" method="post">
        <div class="form-group">
            <label for="report_number">Report Number</label>
            <input class="form-control" type="text" id="report_number" name="report_number">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="date">Date [YYYY-MM-DD]</label>
            <input class="form-control" type="text" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="request">Type of Request</label>
            <input class="form-control" type="text" id="request" name="request">
        </div>
        <div class="form-group">
            <label for="request_resolved">Average Time to Resolve</label>
            <input class="form-control" type="text" id="request_resolved" name="request_resolved">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
        </div>
    </form>
    <div>
        <br>
        <a href="report_menu.php">Back to Report Menu</a></br>
    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
    session_start();
    require_once('../config.php');
    require_once('../validate_session.php');
    if (isset($_POST['Submit'])){


        /**
         * Grab information from the form submission and store values into variables.
         */
        $RNumber = isset($_POST['report_number']) ? $_POST['report_number'] : " ";
        $TTUsername = isset($_POST['username']) ? $_POST['username'] : " ";
        $RDate = isset($_POST['date']) ? $_POST['date'] : " ";
        $RRequest = isset($_POST['request']) ? $_POST['request'] : " ";
        $RResolve = isset($_POST['request_resolved']) ? $_POST['request_resolved'] : " ";

        //Insert into Student table;

        $queryReport  = "INSERT INTO Report (RNumber,TTUsername,RDate,RRequest, RResolve)
                            VALUES ('".$RNumber."', '".$TTUsername."', '".$RDate."', '".$RRequest."', '".$RResolve."');";

        // The query sent to the DB can be printed by not commenting the following row
        //echo $queryStudent;
        if ($conn->query($queryReport) === TRUE) {
            echo "<br> New record created successfully for report number ".$RNumber;
        } else {
            echo "<br> The record was not created, the query: <br>" . $queryReport . "  <br> Generated the error <br>" . $conn->error;
        }

        // To redirect the page to the student menu right after the query is executed, use the following statement
        // header("Location: student_menu.php");
}
?>


</body>

</html>
