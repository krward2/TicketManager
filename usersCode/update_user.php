<!--
/**
 * CS 4342 Database Management
 * @author Alan Licerio
 * @version 1.0
 *
 * This file updates the information of a user.
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['Uid'])){

    $Uid = isset($_POST['Uid']) ? $_POST['Uid'] : " ";
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
    $email= isset($_POST['email']) ? $_POST['email'] : " ";

    $query = "UPDATE USER SET UFirstName='$firstName', ULastName='$lastName', UEmail='$email' WHERE Uid = $Uid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_users.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No user id received on request at update user";
  die();
}

?>
