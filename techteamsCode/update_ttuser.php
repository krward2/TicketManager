<!--
/**
 * CS 4342 Database Management
 * @author Catalina Chinolla
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['Username'])){

    $Username = isset($_POST['Username']) ? $_POST['Username'] : " ";
    $Password = isset($_POST['Password']) ? $_POST['Password'] : " ";

    $query = "UPDATE techteam SET Username='$Username', Password='$Password', WHERE Username = $Username";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_ttusers.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
else {
    echo "No username received on request at update tech team user";
    die();
}

?>