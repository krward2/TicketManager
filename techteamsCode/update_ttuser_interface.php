<!--
/**
 * CS 4342 Database Management
 * @author Catalina Chinolla
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->


<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Username'])) {
    $Username = $_GET['Username'];
    $sql = "SELECT * FROM techteam where Username = $Username";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No username received on request at update_ttuser_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 TechTeam Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div style="margin-top: 20px" class="container">
    <h1>Update Tech Team User</h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <!-- Displaying a form with the information of the user so values can be modified
         Note that the ID is not shown to be modified, only other attributes. -->

    <form action="update_ttuser.php" method="post">
        <input type="hidden" name="Username" id="Username" value="<?php echo $row['Username'] ?>">
        <div class="form-group">
            <label for="Username">Username</label>
            <input class="form-control" type="text" id="Username" name="Username" value="<?php echo $row['Username'] ?>">
        </div>
        <div class="form-group">
            <label for="Password">Middle Name</label>
            <input class="form-control" type="text" id="Password" name="Password" value="<?php echo $row['Password'] ?>">
        </div>
    </form>
    <div>
        <br>
        <a href="index.php">Back to Tech Team Menu</a></br>
    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>