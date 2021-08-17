<!--
/**
 * CS 4342 Database Management
 * @author Alan Licerio
 * @version 1.0
 *
 * This file inserts a new record into the table User of the DB.
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
        <h1>Create User</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_user.php" method="post">
        <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="user_menu.php">Back Menu</a></br>
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
            $Uid = isset($_POST['id']) ? $_POST['id'] : " ";  
            $UFirstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
            $ULastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
            $UEmail= isset($_POST['email']) ? $_POST['email'] : " ";

            
            //Insert into User table;
            
            $queryUser  = "INSERT INTO User (Uid,UFirstName,ULastName,UEmail)
                        VALUES ('".$Uid."', '".$UFirstName."', '".$ULastName."', '".$UEmail."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryUser) === TRUE) {
            echo "<br> New record created successfully for user id ".$Uid;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryUser . "  <br> Generated the error <br>" . $conn->error;
            }
}
?>


</body>

</html>