<!--
/**
 * CS 4342 Database Management
 * @author Alan Licerio
 * @version 1.0
 *
 * This file updates a user.
 */
-->

<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Uid'])) {
    $uid = $_GET['Uid'];
    $sql = "SELECT * FROM USER where Uid = $uid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No user id received on request at update_user_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 User Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update User</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_user.php" method="post">
            <input type="hidden" name="Uid" id="Uid" value="<?php echo $row['Uid'] ?>">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo $row['UFirstName'] ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo $row['ULastName'] ?>">
            </div>
            <div class="form-group">
                <label for="middle_name">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $row['UEmail'] ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="index.php">Back to User Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>