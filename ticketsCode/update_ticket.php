
<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['TNumber'])){

    $uid = isset($_POST['Uid']) ? $_POST['Uid'] : " ";
    $tNumber = isset($_POST['TNumber']) ? $_POST['TNumber'] : " ";
    $tCategory = isset($_POST['TCategory']) ? $_POST['TCategory'] : " ";
    $tStatus = isset($_POST['TStatus']) ? $_POST['TStatus'] : " ";

    $query = "UPDATE ticket SET Uid='$uid', TCategory='$tCategory', TStatus='$tStatus' WHERE TNumber = $tNumber";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_tickets.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No Ticket Number received on request at update ticket";
  die();
}

?>
