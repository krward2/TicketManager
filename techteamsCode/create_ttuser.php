<!--
/**
 * CS 4342 Database Management
 * @author Catalina Chinolla
 * @version 1.0
 * This file inserts a new record  into the table TechTeam of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create User</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div style="margin-top: 20px" class="container">
    <h1>Create Tech Team User</h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <form action="create_ttuser.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" id="password" name="password">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
        </div>
    </form>
    <div>
        <br>
        <a href="techteam_menu.php">Back Menu</a></br>
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
        $Username = isset($_POST['Username']) ? $_POST['Username'] : " ";
        $Password = isset($_POST['Password']) ? $_POST['Password'] : " ";


        //Insert into  table;

        $queryUser  = "INSERT INTO techteam (Username,Password)
                        VALUES ('".$Username."', '".$Password."');";

        // The query sent to the DB can be printed by not commenting the following row
        //echo $queryStudent;
        if ($conn->query($queryUser) === TRUE) {
            echo "<br> New record created successfully for username: ".$Username;
        } else {
            echo "<br> The record was not created, the query: <br>" . $queryUser . "  <br> Generated the error <br>" . $conn->error;
        }
    }
    ?>


</body>

</html>