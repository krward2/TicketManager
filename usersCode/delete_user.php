<!--
/**
 * CS 4342 Database Management
 * @author Alan Licerio
 * @version 1.0
 *
 * This file deletes a user record from the DB.
 */
-->

<?php 

session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Uid'])){
    $userid = $_GET['Uid'];
    $query = "DELETE from USER where Uid = $userid";

    if ($conn->query($query) === TRUE) {
        echo "User deleted successfuly";
        header("Location: view_users.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No Uid received";
    header("Location: view_users.php");
}

?>